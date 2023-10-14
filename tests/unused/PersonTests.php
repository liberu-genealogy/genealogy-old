<?php

namespace Tests\Feature;

use App\Models\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelLiberu\Forms\TestTraits\CreateForm;
use LaravelLiberu\Forms\TestTraits\DestroyForm;
use LaravelLiberu\Forms\TestTraits\EditForm;
use LaravelLiberu\Tables\Traits\Tests\Datatable;
use LaravelLiberu\Users\Models\User;
use Tests\TestCase;

class PersonTest extends TestCase
{
    use Datatable, DestroyForm, CreateForm, EditForm, RefreshDatabase;

    private $permissionGroup = 'people';
    private $testModel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed()
            ->actingAs(User::first());

        $this->testModel = Person::factory()->make();
    }

    /** @test */
    public function can_view_create_people()
    {
        $this->get(route($this->permissionGroup.'.create', false))
            ->assertStatus(200)
            ->assertJsonStructure(['form']);
    }

    /** @test */
    public function can_store_people()
    {
        $response = $this->post(
            route('people.store', [], false),
            $this->testModel->toArray() + []
        );

        $people = Person::where('gid', $this->testModel->gid)->first();

        $response->assertStatus(200)
            ->assertJsonStructure(['message'])
            ->assertJsonFragment([
                'redirect' => 'people.edit',
                'param' => ['people' => $people->id],
            ]);
    }

    /** @test */
    public function can_update_people()
    {
        $this->testModel->save();

        $this->testModel->gid = 'updated';

        $this->patch(
            route('people.update', $this->testModel->id, false),
            $this->testModel->toArray() + []
        )->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertEquals('updated', $this->testModel->fresh()->gid);
    }

    /** @test */
    public function get_option_list()
    {
        $this->testModel->save();

        $this->get(route('people.options', [
            'query' => $this->testModel->gid,
            'limit' => 10,
        ], false))
            ->assertStatus(200)
            ->assertJsonFragment(['gid' => $this->testModel->gid]);
    }
}
