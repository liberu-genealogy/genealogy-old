<?php namespace Tests\Unit;

use Tests\TestCase;
use App\Tenant\Manager;

class TenantManagerTest extends TestCase
{

    public function test_can_crud_database_connection()
    {
        $manager = Manager::fromString('test')->connect();

        $this->assertInstanceOf(Manager::class, $manager, 'Resolved Tenant Manager Class');

        if($manager->databaseExists()){
            $manager->dropDatabase();
        }
        $this->assertFalse($manager->databaseExists(), 'Database Does Not Exist');

        $manager->createDatabase();
        $this->assertTrue($manager->databaseExists(), 'Database Created');

        $manager->migrateDatabase();
        $this->assertTrue($manager->getConnection()->table('migrations')->count() > 0, 'Migrations Ran');

        $manager->dropDatabase();
        $this->assertFalse($manager->databaseExists(), 'Database destroyed');

    }
}
