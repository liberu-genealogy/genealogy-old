<?php

namespace Tests\Unit;

use App\Jobs\ImportGedcom;
use App\Models\User;
use App\Tenant\Manager;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class GedcomImportTest extends TestCase
{
    use DatabaseMigrations;

    public function test_can_execute_job()
    {
        $this->needsMySqlConnection();

        $file = new UploadedFile(base_path('tests/Mocks/Tree.ged'), 'Tree.ged');

        $user = User::factory()->create();

        $tenant = Manager::fromModel($user)->connect();

        $path = $tenant->storage()->putFileAs('imports', $file, $file->getFilename());

        ImportGedcom::dispatch($user, $tenant->storagePath($path), 'test');

        // Import Job will disconnect tenant database when completed.
        $tenant->connect();

        $this->assertDatabaseHas('importjobs', [
            'status' => 'complete',
            'slug' => 'test',
        ], $tenant->connectionName());
    }
}
