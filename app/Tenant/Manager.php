<?php

declare(strict_types=1);

namespace App\Tenant;

use App\Models\User;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Database\ConnectionInterface;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Manager
{
    protected User $user;
    protected Repository $config;
    protected DatabaseManager $database;

    protected string|int $tenant_id;
    protected string|null $partition = null;
    protected string $connectionName = 'tenant';
    protected string $defaultDatabase = 'tenant';
    protected string $defaultConnection = 'mysql';

    public function __construct(
        string|int $key,
        Repository $config,
        DatabaseManager $database,
    ) {
        $this->tenant_id = $key;
        $this->partition = "tenant_{$key}";
        $this->database = $database;
        $this->config = $config;
    }

    public static function fromModel(Model $model): self
    {
        return app(static::class, [
            'key' => $model->getKey(),
        ]);
    }

    public static function tenant(string $key): self
    {
        return app(static::class, [
            'key' => $key,
        ]);
    }

    public function connect(bool $default = false): self
    {
        $this->config->set('database.connections.tenant.database', $this->partition);
        if ($default) {
            $this->config->set('database.default', $this->connectionName);
        }
        $this->database->reconnect($this->connectionName);
        $this->database->reconnect($this->defaultConnection);

        return $this;
    }

    public function disconnect(): self
    {
        $this->config->set('database.default', $this->defaultConnection);
        $this->config->set('database.connections.tenant.database', $this->defaultDatabase);
        $this->database->reconnect($this->connectionName);
        $this->database->reconnect($this->defaultConnection);

        return $this;
    }

    public function database(): ConnectionInterface
    {
        return $this->database->connection($this->connectionName);
    }

    public function databaseExists(): bool
    {
        try {
            if ($this->config->get('database.default') == 'sqlite') {
                // $this->connect(true);
                $this->config->set('database.default', 'tenant');
            }

            return count($this->database->select(<<<SQL
        SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '{$this->partition}';
        SQL)) > 0;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function createDatabase(): self
    {
        $charset = $this->config->get('database.connections.mysql.charset', 'utf8');
        $collate = $this->config->get('database.connections.mysql.collation', 'utf8_unicode_ci');
        $this->database->statement("CREATE DATABASE {$this->partition} CHARACTER SET {$charset} COLLATE {$collate}");

        return $this;
    }

    public function dropDatabase(): self
    {
        $this->database->statement("DROP DATABASE {$this->partition}");

        return $this;
    }

    public function migrateDatabase(): self
    {
        Artisan::call('migrate:fresh', [
            '--realpath' => database_path('migrations/tenant'),
            '--database' => $this->connectionName,
            '--force'    => true,
        ]);

        return $this;
    }

    public function hasStoragePartition(): bool
    {
        return $this->rootStorage()->exists($this->partition);
    }

    public function makeStoragePartition(): bool
    {
        return $this->rootStorage()->makeDirectory($this->partition);
    }

    public function deleteStoragePartition(): bool
    {
        return $this->rootStorage()->deleteDirectory($this->partition);
    }

    public function storage(): Filesystem
    {
        if (! $this->hasStoragePartition()) {
            $this->makeStoragePartition();
        }

        return Storage::build([
            'driver' => 'local',
            'root' => storage_path("tenants/{$this->partition}"),
        ]);
    }

    public function rootStorage(): Filesystem
    {
        return Storage::build([
            'driver' => 'local',
            'root' => storage_path('tenants'),
        ]);
    }

    public function storagePath(string $path): string
    {
        return storage_path("tenants/{$this->partition}/{$path}");
    }

    public function connectionName(): string
    {
        return $this->connectionName;
    }

    public function partitionName(): string
    {
        return $this->partition;
    }

    public function tenantId(): string|int
    {
        return $this->tenant_id;
    }
}
