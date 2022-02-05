<?php namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;
use App\Tenant\Manager;
use Illuminate\Support\Facades\DB;

class TenantManagerTest extends TestCase
{
    public function test_can_use_database_connection()
    {
        $manager = Manager::tenant('test')->connect();

        $this->assertInstanceOf(Manager::class, $manager, 'Resolved Tenant Manager Class');

        if($manager->databaseExists()){
            $manager->dropDatabase();
        }
        $this->assertFalse($manager->databaseExists(), 'Database Does Not Exist');

        $manager->createDatabase();
        $this->assertTrue($manager->databaseExists(), 'Database Created');

        $manager->migrateDatabase();
        $this->assertTrue($manager->database()->table('migrations')->count() > 0, 'Migrations Ran');

        $manager->dropDatabase();
        $this->assertFalse($manager->databaseExists(), 'Database destroyed');
        $manager->disconnect();
    }

    public function test_can_swap_default_database_connection()
    {
        $manager = Manager::tenant('test')->connect(true);

        $this->assertSame('tenant', DB::getDefaultConnection());
        $this->assertSame('tenant', User::query()->getConnection()->getName());

        $manager->disconnect();

        $this->assertSame('mysql', DB::getDefaultConnection());
        $this->assertSame('mysql', User::query()->getConnection()->getName());
    }

    /**
     * Expected Result
     * Directory created (storage/tenants/tenant_1)
     */
    public function test_can_manage_storage_partitions()
    {
        $manager = Manager::tenant('test')->connect();

        $manager->deleteStoragePartition();
        $this->assertFalse($manager->hasStoragePartition(), 'Storage Partition Directory Does Not Exist');

        $manager->makeStoragePartition();
        $this->assertTrue($manager->hasStoragePartition(), 'Storage Partition Directory Created');

        $manager->deleteStoragePartition();
        $this->assertFalse($manager->hasStoragePartition(), 'Storage Partition Directory Does Not Exist');
    }
}
