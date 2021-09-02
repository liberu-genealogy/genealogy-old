<?php

namespace Tests\Feature;

use App\Models\Place;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelEnso\Forms\TestTraits\CreateForm;
use LaravelEnso\Forms\TestTraits\DestroyForm;
use LaravelEnso\Forms\TestTraits\EditForm;
use LaravelEnso\Tables\Traits\Tests\Datatable;
use LaravelEnso\Users\Models\User;
use Tests\TestCase;

class PlaceTest extends TestCase
{
    use Datatable, DestroyForm, CreateForm, EditForm, RefreshDatabase;

    private $permissionGroup = 'places';
    private $testModel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed()
            ->actingAs(User::first());

        $this->testModel = Place::factory()->make();
    }

    /** @test */
    public function can_view_create_places()
    {
        $this->get(route($this->permissionGroup.'.create', false))
            ->assertStatus(200)
            ->assertJsonStructure(['form']);
    }

    /** @test */
    public function can_store_places()
    {
        $response = $this->post(
            route('places.store', [], false),
            $this->testModel->toArray() + []
        );

        $place = Place::where('title', $this->testModel->title)->first();

        $response->assertStatus(200)
            ->assertJsonStructure(['message'])
            ->assertJsonFragment([
                'redirect' => 'places.edit',
                'param' => ['place' => $place->id],
            ]);
    }

    /** @test */
    public function can_update_places()
    {
        $this->testModel->save();

        $this->testModel->title = 'updated';

        $this->patch(
            route('places.update', $this->testModel->id, false),
            $this->testModel->toArray() + []
        )->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertEquals('updated', $this->testModel->fresh()->title);
    }

    /** @test */
    public function get_option_list()
    {
        $this->testModel->save();

        $this->get(route('places.options', [
            'query' => $this->testModel->title,
            'limit' => 10,
        ], false))
            ->assertStatus(200)
            ->assertJsonFragment(['title' => $this->testModel->title]);
    }
}
