<?php namespace Tests\Unit;

use App\Tenant\Manager;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\User;
use App\Jobs\ImportGedcom;
use Illuminate\Http\UploadedFile;

class GedcomImportTest extends TestCase
{
    use DatabaseMigrations;

    public function test_can_execute_job()
    {
        $file = new UploadedFile(base_path('tests/Mocks/Tree.ged'), 'Tree.ged');

        $user = User::factory()->create();

        $tenant = Manager::fromModel($user)->connect();

        $path = $tenant->storage()->putFileAs("imports", $file, $file->getFilename());

        ImportGedcom::dispatch($user, $tenant->storagePath($path), 'test');

        // Import Job will disconnect tenant database when completed.
        $tenant->connect();

        $this->assertDatabaseHas('importjobs', [
            'status' => 'complete',
            'slug' => 'test',
        ], $tenant->connectionName());
    }
}
