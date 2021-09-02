<?php

namespace Tests\Feature;

use App\Models\Tree;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelEnso\Forms\TestTraits\CreateForm;
use LaravelEnso\Forms\TestTraits\DestroyForm;
use LaravelEnso\Forms\TestTraits\EditForm;
use LaravelEnso\Tables\Traits\Tests\Datatable;
use LaravelEnso\Users\Models\User;
use Tests\TestCase;

class TreeTest extends TestCase
{
    use Datatable, DestroyForm, CreateForm, EditForm, RefreshDatabase;

    private $permissionGroup = 'trees';
    private $testModel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed()
            ->actingAs(User::first());

        $this->testModel = Tree::factory()->make();
    }

    /** @test */
    public function can_view_create_trees()
    {
        $this->get(route($this->permissionGroup.'.create', false))
            ->assertStatus(200)
            ->assertJsonStructure(['form']);
    }

    /** @test */
    public function can_store_trees()
    {
        $response = $this->post(
            route('trees.store', [], false),
            $this->testModel->toArray() + []
        );

        $tree = Tree::where('name', $this->testModel->name)->first();

        $response->assertStatus(200)
            ->assertJsonStructure(['message'])
            ->assertJsonFragment([
                'redirect' => 'trees.edit',
                'param' => ['trees' => $tree->id],
            ]);
    }

    /** @test */
    public function can_update_trees()
    {
        $this->testModel->save();

        $this->testModel->name = 'updated';

        $this->patch(
            route('trees.update', $this->testModel->id, false),
            $this->testModel->toArray() + []
        )->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertEquals('updated', $this->testModel->fresh()->name);
    }

    /** @test */
    public function get_option_list()
    {
        $this->testModel->save();

        $this->get(route('trees.options', [
            'query' => $this->testModel->name,
            'limit' => 10,
        ], false))
            ->assertStatus(200)
            ->assertJsonFragment(['name' => $this->testModel->name]);
    }
}
