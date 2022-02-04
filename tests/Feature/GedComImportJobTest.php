<?php namespace Tests\Feature;

use App\Models\Company;
use App\Models\Person;
use App\Tenant\Manager;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use App\Models\User;
use App\Jobs\ImportGedcom;
use Illuminate\Support\Facades\File;

class GedComImportJobTest extends TestCase
{
    public function test_can_execute_job()
    {
        File::copy(base_path('tests/Mocks/Tree.ged'), storage_path('app/imports/Tree.ged'));

        $user = User::factory()->create();

        $tenant = Manager::fromModel($user);

        ImportGedcom::dispatch($user, storage_path('app/imports/Tree.ged'));

        $this->assertDatabaseHas('importjobs', [
            'status' => 'complete'
        ], $tenant->getConnectionName());

//        $this->withoutMiddleware();
//        $this
//            ->actingAs(User::factory()->create(), 'api')
//            ->post(route('gedcom.store'), [
//                'file' => new UploadedFile(storage_path('app/imports/Tree.ged'), 'Tree.ged'),
//                'slug' => 'test',
//            ])
//            ->assertOk();
//
//        $person = Person::factory()->create([]);
//        $user = User::factory()->create([
//            'person_id' => $person->id,
//            'is_active' => 1,
//        ]);
//        $company = Company::factory()->create([
//            'is_tenant' => 1,
//            'status' => 1,
//        ]);
//        $user->companies()->attach($company->id, [
//            'company_id' => $company->id,
//            'person_id' => $person->id,
//            'is_mandatary' => 1,
//            'is_main' => 1,
//        ]);

    }
}
