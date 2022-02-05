<?php namespace Tests\Unit;

use Tests\TestCase;
use App\Tenant\Manager;
use Illuminate\Http\UploadedFile;

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
        $this->assertTrue($manager->getConnection()->table('migrations')->count() > 0, 'Migrations Ran');

        $manager->dropDatabase();
        $this->assertFalse($manager->databaseExists(), 'Database destroyed');
        $manager->disconnect();
    }

    /**
     * Expected Result
     * Directory created (storage/tenants/tenant_1)
     */
    public function test_can_manage_storage_partitions()
    {
        $manager = Manager::tenant('test');

        $manager->deleteStoragePartition();
        $this->assertDirectoryDoesNotExist($manager->storagePath(), 'Storage Partition Directory Does Not Exist');

        $manager->makeStoragePartition();
        $partition = $manager->storagePath();
        $this->assertTrue($manager->directoryExists($partition), 'Storage File Created');

        $manager->deleteStoragePartition();
        $this->assertDirectoryDoesNotExist($partition, 'Storage Partition Directory Deleted');
    }

    /**
     * Expected Result
     * Directory created (storage/tenants/tenant_1/test-directories)
     */
    public function test_can_manage_partitioned_directories()
    {
        $manager = Manager::tenant('test')->makeStoragePartition();

        $manager->makeDirectory('test-directories');
        $this->assertTrue($manager->directoryExists('test-directories'), 'Storage Directory Created');

        $manager->deleteDirectory('test-directories');
        $this->assertFalse($manager->directoryExists('test-directories'), 'Storage Directory Deleted');
    }

    /**
     * Expected Result
     * File created (storage/tenants/tenant_1/test-uploads/upload.txt)
     */
    public function test_can_store_uploaded_file_object()
    {
        $manager = Manager::tenant('test')->makeStoragePartition();

        $tempFile = sys_get_temp_dir(). '/6743267432.txt';

        file_put_contents($tempFile, 'test');

        $uploadedFile = new UploadedFile($tempFile, 'upload.txt', 'text/plain');

        $path = $manager->storeUploadedFileAs($uploadedFile, 'test-uploads');

        $this->assertTrue($manager->directoryExists('test-uploads'), 'Storage Directory Created');
        $this->assertTrue($manager->fileExists($path), 'Storage File Created');

        $manager->deleteFile($path);
        $this->assertFalse($manager->fileExists($path), 'Storage File Deleted');
    }

    /**
     * Expected Result
     * File created (storage/tenants/tenant_1/test-uploads/text.txt)
     */
    public function test_can_manage_files()
    {
        $manager = Manager::tenant('test')->makeStoragePartition();

        $path = $manager->storeFileAs('test-uploads/text.txt', 'test');
        $this->assertTrue($manager->fileExists($path), 'Storage File Created');

        $manager->deleteFile($path);
        $this->assertFalse($manager->fileExists($path), 'Storage File Deleted');
        $manager->deleteDirectory('test-uploads');
    }
}
