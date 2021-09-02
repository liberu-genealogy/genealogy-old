<?php

namespace Tests\Feature;

use App\Models\MediaObjeectFile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelEnso\Forms\TestTraits\CreateForm;
use LaravelEnso\Forms\TestTraits\DestroyForm;
use LaravelEnso\Forms\TestTraits\EditForm;
use LaravelEnso\Tables\Traits\Tests\Datatable;
use LaravelEnso\Users\Models\User;
use Tests\TestCase;

class MediaObjeectFileTest extends TestCase
{
    use Datatable, DestroyForm, CreateForm, EditForm, RefreshDatabase;

    private $permissionGroup = 'media_objects_file';
    private $testModel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed()
            ->actingAs(User::first());

        $this->testModel = MediaObjeectFile::factory()->make();
    }

    /** @test */
    public function can_view_create_media_objects_file()
    {
        $this->get(route($this->permissionGroup.'.create', false))
            ->assertStatus(200)
            ->assertJsonStructure(['form']);
    }

    /** @test */
    public function can_store_media_objects_file()
    {
        $response = $this->post(
            route('media_objects_file.store', [], false),
            $this->testModel->toArray() + []
        );

        $media_objects_file = MediaObjeectFile::where('gid', $this->testModel->gid)->first();

        $response->assertStatus(200)
            ->assertJsonStructure(['message'])
            ->assertJsonFragment([
                'redirect' => 'media_objects_file.edit',
                'param' => ['media_objects_file' => $media_objects_file->id],
            ]);
    }

    /** @test */
    public function can_update_media_objects_file()
    {
        $this->testModel->save();

        $this->testModel->gid = 'updated';

        $this->patch(
            route('media_objects_file.update', $this->testModel->id, false),
            $this->testModel->toArray() + []
        )->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertEquals('updated', $this->testModel->fresh()->gid);
    }

    /** @test */
    public function get_option_list()
    {
        $this->testModel->save();

        $this->get(route('media_objects_file.options', [
            'query' => $this->testModel->gid,
            'limit' => 10,
        ], false))
            ->assertStatus(200)
            ->assertJsonFragment(['gid' => $this->testModel->gid]);
    }
}
