<?php

namespace Tests\Feature;

use App\Models\PersonSubm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelEnso\Forms\TestTraits\CreateForm;
use LaravelEnso\Forms\TestTraits\DestroyForm;
use LaravelEnso\Forms\TestTraits\EditForm;
use LaravelEnso\Tables\Traits\Tests\Datatable;
use LaravelEnso\Users\Models\User;
use Tests\TestCase;

class PersonSubmTest extends TestCase
{
    use Datatable, DestroyForm, CreateForm, EditForm, RefreshDatabase;

    private $permissionGroup = 'personsubm';
    private $testModel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed()
            ->actingAs(User::first());

        $this->testModel = PersonSubm::factory()->make();
    }

    /** @test */
    public function can_view_create_person_subm()
    {
        $this->get(route($this->permissionGroup.'.create', false))
            ->assertStatus(200)
            ->assertJsonStructure(['form']);
    }

    /** @test */
    public function can_store_person_subm()
    {
        $response = $this->post(
            route('personsubm.store', [], false),
            $this->testModel->toArray() + []
        );

        $person_subm = PersonSubm::where('gid', $this->testModel->gid)->first();

        $response->assertStatus(200)
            ->assertJsonStructure(['message'])
            ->assertJsonFragment([
                'redirect' => 'personsubm.edit',
                'param' => ['person_subm' => $person_subm->id],
            ]);
    }

    /** @test */
    public function can_update_person_subm()
    {
        $this->testModel->save();

        $this->testModel->gid = 'updated';

        $this->patch(
            route('personsubm.update', $this->testModel->id, false),
            $this->testModel->toArray() + []
        )->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertEquals('updated', $this->testModel->fresh()->gid);
    }

    /** @test */
    public function get_option_list()
    {
        $this->testModel->save();

        $this->get(route('personsubm.options', [
            'query' => $this->testModel->subm,
            'limit' => 10,
        ], false))
            ->assertStatus(200)
            ->assertJsonFragment(['subm' => $this->testModel->subm]);
    }
}
