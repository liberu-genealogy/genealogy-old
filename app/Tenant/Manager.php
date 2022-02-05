<?php declare(strict_types=1);

namespace App\Tenant;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Config\Repository;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\DatabaseManager;
use Illuminate\Database\ConnectionInterface;

class Manager
{
    protected User $user;
    protected Repository $config;
    protected DatabaseManager $database;

    protected string|int $tenant_id;
    protected string|null $partition = null;
    protected string $disk = 'tenant';
    protected string $connectionName = "tenant";
    protected string $defaultDatabase = "tenant";
    protected string $defaultConnection = "mysql";

    public function __construct(
        string|int      $key,
        Repository      $config,
        DatabaseManager $database,
    )
    {
        $this->tenant_id = $key;
        $this->partition = "tenant_{$key}";
        $this->database = $database;
        $this->config = $config;
    }

    public static function fromModel(Model $model): self
    {
        return app(static::class, [
            'key' => $model->getKey()
        ]);
    }

    public static function tenant(string $key): self
    {
        return app(static::class, [
            'key' => $key
        ]);
    }

    public function getConnection(): ConnectionInterface
    {
        return $this->database->connection($this->connectionName);
    }

    public function connect(bool $default = false): self
    {
        if ($default) {
            $this->config->set('database.default', $this->connectionName);
        }
        $this->config->set('database.connections.tenant.database', $this->partition);
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

    public function getConnectionName(): string
    {
        return $this->connectionName;
    }

    public function getPartitionName(): string
    {
        return $this->partition;
    }

    public function getDiskName(): string
    {
        return $this->disk;
    }

    public function getTenantId(): string|int
    {
        return $this->tenant_id;
    }

    public function databaseExists(): bool
    {
        return count($this->database->select(<<<SQL
        SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '{$this->partition}'
        SQL)) > 0;
    }

    public function createDatabase(): self
    {
        $charset = $this->config->get("database.connections.mysql.charset", 'utf8');
        $collate = $this->config->get("database.connections.mysql.collation", 'utf8_unicode_ci');
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
        /**
         * @docs https://stackoverflow.com/questions/49746440/laravel-artisan-use-of-undefined-constant-stdin-assumed-stdin-infinite-loop
         */
        // if (!defined('STDIN')) {
        //     define('STDIN', fopen('php://stdin', 'r'));
        // }
        Artisan::call('migrate:fresh', [
            '--realpath' => database_path('migrations/tenant'),
            '--database' => $this->connectionName,
            '--force'    => true,
        ]);
        return $this;
    }

    public function hasStoragePartition(): bool
    {
        return Storage::disk($this->disk)->exists($this->partition);
    }

    public function makeStoragePartition(): self
    {
        Storage::disk($this->disk)->makeDirectory($this->partition);
        return $this;
    }

    public function deleteStoragePartition(): self
    {
        Storage::disk($this->disk)->deleteDirectory($this->partition);
        return $this;
    }

    public function getStorage(): bool
    {
        return Storage::disk($this->disk)->exists($this->partition);
    }
}
