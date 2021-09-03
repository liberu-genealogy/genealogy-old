<?php

namespace Tests\Feature;

use App\Models\PersonLds;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelEnso\Forms\TestTraits\CreateForm;
use LaravelEnso\Forms\TestTraits\DestroyForm;
use LaravelEnso\Forms\TestTraits\EditForm;
use LaravelEnso\Tables\Traits\Tests\Datatable;
use LaravelEnso\Users\Models\User;
use Tests\TestCase;

class PersonLdsTest extends TestCase
{
    use Datatable, DestroyForm, CreateForm, EditForm, RefreshDatabase;

    private $permissionGroup = 'personlds';
    private $testModel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed()
            ->actingAs(User::first());

        $this->testModel = PersonLds::factory()->make();
    }

    /** @test */
    public function can_view_create_person_lds()
    {
        $this->get(route($this->permissionGroup.'.create', false))
            ->assertStatus(200)
            ->assertJsonStructure(['form']);
    }

    /** @test */
    public function can_store_person_lds()
    {
        $response = $this->post(
            route('personlds.store', [], false),
            $this->testModel->toArray() + []
        );

        $person_lds = PersonLds::where('gid', $this->testModel->gid)->first();

        $response->assertStatus(200)
            ->assertJsonStructure(['message'])
            ->assertJsonFragment([
                'redirect' => 'personlds.edit',
                'param' => ['person_lds' => $person_lds->id],
            ]);
    }

    /** @test */
    public function can_update_person_lds()
    {
        $this->testModel->save();

        $this->testModel->gid = 'updated';

        $this->patch(
            route('personlds.update', $this->testModel->id, false),
            $this->testModel->toArray() + []
        )->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertEquals('updated', $this->testModel->fresh()->gid);
    }

    /** @test */
    public function get_option_list()
    {
        $this->testModel->save();

        $this->get(route('personlds.options', [
            'query' => $this->testModel->type,
            'limit' => 10,
        ], false))
            ->assertStatus(200)
            ->assertJsonFragment(['type' => $this->testModel->type]);
    }
}
