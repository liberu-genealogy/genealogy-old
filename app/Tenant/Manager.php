<?php declare(strict_types=1);

namespace App\Tenant;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Config\Repository;
use Illuminate\Http\UploadedFile;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\DatabaseManager;
use Illuminate\Database\ConnectionInterface;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class Manager
{
    protected User $user;
    protected Repository $config;
    protected Filesystem $storage;
    protected DatabaseManager $database;

    protected string|int $tenant_id;
    protected ?string $partition = null;
    protected string $connectionName = "tenant";
    protected string $defaultDatabase = "tenant";
    protected string $defaultConnection = "mysql";

    public function __construct(
        string|int      $key,
        Repository      $config,
        Filesystem      $storage,
        DatabaseManager $database,
    )
    {
        $this->tenant_id = $key;
        $this->partition = "tenant_{$key}";
        $this->database = $database;
        $this->storage = $storage;
        $this->config = $config;
    }

    public static function fromModel(Model $model): self
    {
        return app(static::class, [
            'key' => $model->getKey()
        ])->connect();
    }

    public static function tenant(string $key): self
    {
        return app(static::class, [
            'key' => $key
        ])->connect();
    }

    public function getConnection(): ConnectionInterface
    {
        return $this->database->connection($this->connectionName);
    }

    public function connect(bool $default = false): self
    {
        $this->config->set('database.default', $this->connectionName);
        $this->config->set('database.connections.tenant.database', $this->partition);
        $this->database->reconnect($this->connectionName);
        return $this;
    }

    public function disconnect(): self
    {
        $this->config->set('database.default', $this->defaultConnection);
        $this->config->set('database.connections.tenant.database', $this->defaultDatabase);
        $this->database->purge($this->connectionName);
        $this->database->purge($this->defaultConnection);
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

    public function getTenantId(): string|int
    {
        return $this->tenant_id;
    }

    public function databaseExists(): bool
    {
        return count($this->database->select(<<<SQL
        SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '{$this->partition}'
        SQL
        )) > 0;
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

    public function storagePath(?string $path = null, ?string $fileName = null): string
    {
        $value = Str::of($path);

        if(!$value->contains("/storage/tenants/{$this->partition}")){
            $value = $value
                ->ltrim('/')
                ->prepend(storage_path("tenants/{$this->partition}/"));
        }

        if($fileName){
            $value = $value->append("/$fileName");
        }

        return (string) $value;
    }

    public function makeStoragePartition(): self
    {
        $this->storage->ensureDirectoryExists($this->storagePath());
        return $this;
    }

    public function deleteStoragePartition(): self
    {
        $this->storage->deleteDirectory($this->storagePath());
        return $this;
    }

    public function storeFileAs(string $path, string $contents): false|string
    {
        $path = $this->storagePath($path);
        if($this->storage->put($path, $contents)){
            return $path;
        }
        return false;
    }

    public function storeUploadedFileAs(UploadedFile $file, string $path): false|string
    {
        $name = Str::of($file->getClientOriginalName());

        if($file->getExtension()){
            $name->append(".{$file->getExtension()}");
        }

        if($path = $file->storeAs("{$this->partition}/{$path}", (string) $name, ['disk' => 'tenant'])){
            return storage_path("tenants/$path");
        }
        return false;
    }

    public function fileExists(string $path): bool
    {
        return $this->storage->isFile($this->storagePath($path));
    }

    public function directoryExists(string $path): bool
    {
        return $this->storage->isDirectory($this->storagePath($path));
    }

    public function getFileContents(string $path): ?string
    {
        try {
            return $this->storage->get($this->storagePath($path));
        } catch (FileNotFoundException $exception) {
            return null;
        }
    }

    public function deleteFile(string $path): self
    {
        $this->storage->delete($this->storagePath($path));
        return $this;
    }

    public function makeDirectory(string $path): self
    {
        $this->storage->makeDirectory($this->storagePath($path), 0755, true, true);
        return $this;
    }

    public function cleanDirectory(string $path): self
    {
        $this->storage->cleanDirectory($this->storagePath($path));
        return $this;
    }

    public function deleteDirectory(string $path): self
    {
        $this->storage->deleteDirectory($this->storagePath($path));
        return $this;
    }

}
