<?php

namespace Tests\Feature;

use App\Models\ImportJob;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelLiberu\Forms\TestTraits\CreateForm;
use LaravelLiberu\Forms\TestTraits\DestroyForm;
use LaravelLiberu\Forms\TestTraits\EditForm;
use LaravelLiberu\Tables\Traits\Tests\Datatable;
use LaravelLiberu\Users\Models\User;
use Tests\TestCase;

class ImportJobTest extends TestCase
{
    use Datatable, DestroyForm, CreateForm, EditForm, RefreshDatabase;

    private $permissionGroup = 'importjobs';
    private $testModel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed()
            ->actingAs(User::first());

        $this->testModel = ImportJob::factory()->make();
    }

    /** @test */
    public function can_view_create_importjob()
    {
        $this->get(route($this->permissionGroup.'.create', false))
            ->assertStatus(200)
            ->assertJsonStructure(['form']);
    }

    /** @test */
    public function can_store_importjob()
    {
        $response = $this->post(
            route('importjobs.store', [], false),
            $this->testModel->toArray() + []
        );

        $importjob = ImportJob::where('user_id', $this->testModel->user_id)->first();

        $response->assertStatus(200)
            ->assertJsonStructure(['message'])
            ->assertJsonFragment([
                'redirect' => 'importjobs.edit',
                'param' => ['importjob' => $importjob->id],
            ]);
    }

    /** @test */
    public function can_update_importjob()
    {
        $this->testModel->save();

        $this->testModel->user_id = 'updated';

        $this->patch(
            route('importjob.update', $this->testModel->id, false),
            $this->testModel->toArray() + []
        )->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertEquals('updated', $this->testModel->fresh()->user_iduser_id);
    }

    /** @test */
    public function get_option_list()
    {
        $this->testModel->save();

        $this->get(route('importjobs.options', [
            'query' => $this->testModel->user_id,
            'limit' => 10,
        ], false))
            ->assertStatus(200)
            ->assertJsonFragment(['user_id' => $this->testModel->user_id]);
    }
}
