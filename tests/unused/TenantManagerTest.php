<?php

namespace Tests\Unit;

use App\Models\User;
use App\Tenant\Manager;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class TenantManagerTest extends TestCase
{
    public function test_can_use_database_connection()
    {
        $this->needsMySqlConnection();

        $tenant = Manager::tenant('test')->connect();

        $this->assertInstanceOf(Manager::class, $tenant, 'Resolved Tenant Manager Class');

        if ($tenant->databaseExists()) {
            $tenant->dropDatabase();
        }
        $this->assertFalse($tenant->databaseExists(), 'Database Does Not Exist');

        $tenant->createDatabase();
        $this->assertTrue($tenant->databaseExists(), 'Database Created');

        $tenant->migrateDatabase();
        $this->assertTrue($tenant->database()->table('migrations')->count() > 0, 'Migrations Ran');

        $tenant->dropDatabase();
        $this->assertFalse($tenant->databaseExists(), 'Database destroyed');
        $tenant->disconnect();
    }

    /**
     * Default database connection is switched to tenant and back to default.
     */
    public function test_can_swap_default_database_connection()
    {
        $tenant = Manager::tenant('test')->connect(true);

        $this->assertSame('tenant', DB::getDefaultConnection());
        $this->assertSame('tenant', User::query()->getConnection()->getName());

        $tenant->disconnect();

        $this->assertSame('mysql', DB::getDefaultConnection());
        $this->assertSame('mysql', User::query()->getConnection()->getName());
    }

    /**
     * Directory created (storage/tenants/tenant_1).
     */
    public function test_can_manage_storage_partitions()
    {
        $tenant = Manager::tenant('test')->connect();

        $tenant->deleteStoragePartition();
        $this->assertFalse($tenant->hasStoragePartition(), 'Storage Partition Directory Does Not Exist');

        $tenant->makeStoragePartition();
        $this->assertTrue($tenant->hasStoragePartition(), 'Storage Partition Directory Created');

        $tenant->deleteStoragePartition();
        $this->assertFalse($tenant->hasStoragePartition(), 'Storage Partition Directory Does Not Exist');
    }

    /**
     * File created (storage/tenants/tenant_1/test.txt).
     */
    public function test_can_provide_scoped_storage_instance()
    {
        $tenant = Manager::tenant('test')->connect();
        $file = UploadedFile::fake()->create('test.txt');

        $path = $tenant->storage()->putFileAs('imports', $file, $file->getFilename());
        $this->assertFileExists($tenant->storagePath($path), 'File Exists in Tenant Storage');

        $tenant->deleteStoragePartition();
    }
}
