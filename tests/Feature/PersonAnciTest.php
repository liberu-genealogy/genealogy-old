<?php

namespace Tests\Feature;

use App\Models\PersonAnci;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelEnso\Forms\TestTraits\CreateForm;
use LaravelEnso\Forms\TestTraits\DestroyForm;
use LaravelEnso\Forms\TestTraits\EditForm;
use LaravelEnso\Tables\Traits\Tests\Datatable;
use LaravelEnso\Users\Models\User;
use Tests\TestCase;

class PersonAnciTest extends TestCase
{
    use Datatable, DestroyForm, CreateForm, EditForm, RefreshDatabase;

    private $permissionGroup = 'personanci';
    private $testModel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed()
            ->actingAs(User::first());

        $this->testModel = PersonAnci::factory()->make();
    }

    /** @test */
    public function can_view_create_person_anci()
    {
        $this->get(route($this->permissionGroup.'.create', false))
            ->assertStatus(200)
            ->assertJsonStructure(['form']);
    }

    /** @test */
    public function can_store_person_anci()
    {
        $response = $this->post(
            route('personanci.store', [], false),
            $this->testModel->toArray() + []
        );

        $person_anci = PersonAnci::where('gid', $this->testModel->gid)->first();

        $response->assertStatus(200)
            ->assertJsonStructure(['message'])
            ->assertJsonFragment([
                'redirect' => 'personanci.edit',
                'param' => ['person_anci' => $person_anci->id],
            ]);
    }

    /** @test */
    public function can_update_person_anci()
    {
        $this->testModel->save();

        $this->testModel->gid = 'updated';

        $this->patch(
            route('personanci.update', $this->testModel->id, false),
            $this->testModel->toArray() + []
        )->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertEquals('updated', $this->testModel->fresh()->gid);
    }

    /** @test */
    public function get_option_list()
    {
        $this->testModel->save();

        $this->get(route('personanci.options', [
            'query' => $this->testModel->anci,
            'limit' => 10,
        ], false))
            ->assertStatus(200)
            ->assertJsonFragment(['anci' => $this->testModel->anci]);
    }
}
