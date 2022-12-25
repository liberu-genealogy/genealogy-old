<?php

declare(strict_types=1);

namespace App\Tenant;

use App\Models\Tenant;
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
    protected string $connectionName = 'tenantdb';
    protected string $defaultDatabase = 'tenant';
    protected string $defaultConnection = 'mysql';

    public function __construct(
        string|int $company_id,
        string|int $user_id,
        Repository $config,
        DatabaseManager $database,
    ) {
        $this->tenant_id = $company_id;
        $this->partition = "tenant{$company_id}";
        $this->database = $database;
        $this->config = $config;
    }

    public static function fromModel(Model $model, User $user): self
    {
        return app(static::class, [
            'company_id' => $model->getKey(),
            'user_id' => $user->getKey(),
        ]);
    }

    public static function tenant(string $company_id, string $user_id): self
    {
        return app(static::class, [
            'company_id' => $company_id,
            'user_id' => $user_id,
        ]);
    }

    public function connect(bool $default = false): self
    {
        // $this->config->set('database.connections.tenant.database', $this->partition);
        // $this->database->reconnect($this->connectionName);
        if ($default) {
            $this->config->set('database.default', $this->connectionName);
            $this->database->reconnect($this->defaultConnection);
        } else {
            $tenants = Tenant::find($this->tenant_id);

            tenancy()->initialize($tenants);
        }

        return $this;
    }

    public function disconnect(): self
    {
        $this->config->set('database.default', $this->defaultConnection);
        // $this->config->set('database.connections.tenant.database', $this->defaultDatabase);

        $this->database->reconnect($this->connectionName);
        $this->database->reconnect($this->defaultConnection);

        $defaultDatabase = $this->config->get('database.connections.'.$this->defaultConnection.'.database');

        $this->database->statement("USE {$defaultDatabase};");

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
        $this->database->statement("CREATE DATABASE {$this->partition} CHARACTER SET {$charset} COLLATE {$collate};");

        // $this->database->statement("USE {$this->partition};");

        return $this;
    }

    public function dropDatabase(): self
    {
        $this->database->statement("DROP DATABASE {$this->partition};");

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
