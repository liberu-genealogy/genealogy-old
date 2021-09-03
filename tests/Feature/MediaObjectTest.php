<?php

namespace Tests\Feature;

use App\Models\MediaObject;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelEnso\Forms\TestTraits\CreateForm;
use LaravelEnso\Forms\TestTraits\DestroyForm;
use LaravelEnso\Forms\TestTraits\EditForm;
use LaravelEnso\Tables\Traits\Tests\Datatable;
use LaravelEnso\Users\Models\User;
use Tests\TestCase;

class MediaObjectTest extends TestCase
{
    use Datatable, DestroyForm, CreateForm, EditForm, RefreshDatabase;

    private $permissionGroup = 'mediaobjects';
    private $testModel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed()
            ->actingAs(User::first());

        $this->testModel = MediaObject::factory()->make();
    }

    /** @test */
    public function can_view_create_media_object()
    {
        $this->get(route($this->permissionGroup.'.create', false))
            ->assertStatus(200)
            ->assertJsonStructure(['form']);
    }

    /** @test */
    public function can_store_media_object()
    {
        $response = $this->post(
            route('mediaobjects.store', [], false),
            $this->testModel->toArray() + []
        );

        $media_object = MediaObject::where('gid', $this->testModel->gid)->first();

        $response->assertStatus(200)
            ->assertJsonStructure(['message'])
            ->assertJsonFragment([
                'redirect' => 'mediaobjects.edit',
                'param' => ['media_object' => $media_object->id],
            ]);
    }

    /** @test */
    public function can_update_media_object()
    {
        $this->testModel->save();

        $this->testModel->titl = 'updated';

        $this->patch(
            route('mediaobjects.update', $this->testModel->id, false),
            $this->testModel->toArray() + []
        )->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertEquals('updated', $this->testModel->fresh()->titl);
    }

    /** @test */
    public function get_option_list()
    {
        $this->testModel->save();

        $this->get(route('mediaobjects.options', [
            'query' => $this->testModel->titl,
            'limit' => 10,
        ], false))
            ->assertStatus(200)
            ->assertJsonFragment(['titl' => $this->testModel->titl]);
    }
}
