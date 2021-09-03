<?php

namespace Tests\Feature;

use App\Models\PersonAlia;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelEnso\Forms\TestTraits\CreateForm;
use LaravelEnso\Forms\TestTraits\DestroyForm;
use LaravelEnso\Forms\TestTraits\EditForm;
use LaravelEnso\Tables\Traits\Tests\Datatable;
use LaravelEnso\Users\Models\User;
use Tests\TestCase;

class PersonAliaTest extends TestCase
{
    use Datatable, DestroyForm, CreateForm, EditForm, RefreshDatabase;

    private $permissionGroup = 'personalias';
    private $testModel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed()
            ->actingAs(User::first());

        $this->testModel = PersonAlia::factory()->make();
    }

    /** @test */
    public function can_view_create_person_alia()
    {
        $this->get(route($this->permissionGroup.'.create', false))
            ->assertStatus(200)
            ->assertJsonStructure(['form']);
    }

    /** @test */
    public function can_store_person_alia()
    {
        $response = $this->post(
            route('personalias.store', [], false),
            $this->testModel->toArray() + []
        );

        $person_alia = PersonAlia::where('gid', $this->testModel->gid)->first();

        $response->assertStatus(200)
            ->assertJsonStructure(['message'])
            ->assertJsonFragment([
                'redirect' => 'personalias.edit',
                'param' => ['person_alia' => $person_alia->id],
            ]);
    }

    /** @test */
    public function can_update_person_alia()
    {
        $this->testModel->save();

        $this->testModel->gid = 'updated';

        $this->patch(
            route('personalias.update', $this->testModel->id, false),
            $this->testModel->toArray() + []
        )->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertEquals('updated', $this->testModel->fresh()->gid);
    }

    /** @test */
    public function get_option_list()
    {
        $this->testModel->save();

        $this->get(route('personalias.options', [
            'query' => $this->testModel->alia,
            'limit' => 10,
        ], false))
            ->assertStatus(200)
            ->assertJsonFragment(['alia' => $this->testModel->alia]);
    }
}
