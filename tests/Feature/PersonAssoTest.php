<?php

namespace Tests\Feature;

use App\Models\PersonAsso;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelEnso\Forms\TestTraits\CreateForm;
use LaravelEnso\Forms\TestTraits\DestroyForm;
use LaravelEnso\Forms\TestTraits\EditForm;
use LaravelEnso\Tables\Traits\Tests\Datatable;
use LaravelEnso\Users\Models\User;
use Tests\TestCase;

class PersonAssoTest extends TestCase
{
    use Datatable, DestroyForm, CreateForm, EditForm, RefreshDatabase;

    private $permissionGroup = 'personasso';
    private $testModel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed()
            ->actingAs(User::first());

        $this->testModel = PersonAsso::factory()->make();
    }

    /** @test */
    public function can_view_create_person_asso()
    {
        $this->get(route($this->permissionGroup.'.create', false))
            ->assertStatus(200)
            ->assertJsonStructure(['form']);
    }

    /** @test */
    public function can_store_person_asso()
    {
        $response = $this->post(
            route('personasso.store', [], false),
            $this->testModel->toArray() + []
        );

        $person_asso = PersonAsso::where('gid', $this->testModel->gid)->first();

        $response->assertStatus(200)
            ->assertJsonStructure(['message'])
            ->assertJsonFragment([
                'redirect' => 'personasso.edit',
                'param' => ['person_asso' => $person_asso->id],
            ]);
    }

    /** @test */
    public function can_update_person_asso()
    {
        $this->testModel->save();

        $this->testModel->gid = 'updated';

        $this->patch(
            route('personasso.update', $this->testModel->id, false),
            $this->testModel->toArray() + []
        )->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertEquals('updated', $this->testModel->fresh()->gid);
    }

    /** @test */
    public function get_option_list()
    {
        $this->testModel->save();

        $this->get(route('personasso.options', [
            'query' => $this->testModel->indi,
            'limit' => 10,
        ], false))
            ->assertStatus(200)
            ->assertJsonFragment(['indi' => $this->testModel->indi]);
    }
}
