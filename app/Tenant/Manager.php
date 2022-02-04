<?php declare(strict_types=1);

namespace App\Tenant;

use App\Models\User;
use App\Models\Company;
use Illuminate\Config\Repository;
use \Illuminate\Database\DatabaseManager;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\ConnectionInterface;


class Manager
{
    protected User $user;
    protected string $connection = "tenant";
    protected ?string $database = null;
    protected Repository $config;
    protected DatabaseManager $manager;

    public function __construct(string $key, Repository $config, DatabaseManager $manager)
    {
        $this->database = "tenant_{$key}";
        $this->manager = $manager;
        $this->config = $config;
    }

    public static function fromModel(Model $model): self
    {
        return app(static::class, [
            'key' => $model->getKey()
        ])->connect();
    }


    public static function fromString(string $key): self
    {
        return app(static::class, [
            'key' => $key
        ])->connect();
    }

    public function connect(): self
    {
        $this->config->set('database.connections.tenant.database', $this->database);
        $this->manager->purge($this->connection);
        $this->manager->reconnect($this->connection);
        return $this;
    }

    public function disconnect(): self
    {
        $this->config->set('database.connections.tenant.database', $this->connection);
        //$this->config->set('database.default', $this->config->get('database.default_backup'));
        return $this;
    }

    public function asDefault(?string $name = null): self
    {
        $this->config->set('database.default', $name ?? $this->connection);
        return $this;
    }

    public function getConnectionName(): string
    {
        return $this->connection;
    }

    public function getDatabaseName(): ?string
    {
        return $this->database;
    }

    public function getConnection(): ConnectionInterface
    {
        return $this->manager->connection($this->connection);
    }

    public function databaseExists(): bool
    {
       try{
           return !empty($this->manager->select("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '{$this->database}'"));
       }catch (\Throwable $exception){
           return false;
       }
    }

    public function createDatabase(): self
    {
        $charset = $this->config->get("database.connections.mysql.charset", 'utf8');
        $collate = $this->config->get("database.connections.mysql.collation", 'utf8_unicode_ci');
        $this->manager->statement("CREATE DATABASE {$this->database} CHARACTER SET {$charset} COLLATE {$collate}");
        return $this;
    }

    public function dropDatabase(): self
    {
        $this->manager->statement("DROP DATABASE {$this->database}");
        return $this;
    }

    public function migrateDatabase(): self
    {
        /**
         * Windows Hack?
         * @docs https://stackoverflow.com/questions/49746440/laravel-artisan-use-of-undefined-constant-stdin-assumed-stdin-infinite-loop
         */
        if (!defined('STDIN')) {
            define('STDIN', fopen('php://stdin', 'r'));
        }

        Artisan::call('migrate:fresh', [
            '--realpath' => database_path('migrations/tenant'),
            '--database' => $this->connection,
            '--force'    => true,
        ]);
        return $this;
    }
}
