<?php

namespace Tests\Feature;

use App\Models\SourceRef;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelLiberu\Forms\TestTraits\CreateForm;
use LaravelLiberu\Forms\TestTraits\DestroyForm;
use LaravelLiberu\Forms\TestTraits\EditForm;
use LaravelLiberu\Tables\Traits\Tests\Datatable;
use LaravelLiberu\Users\Models\User;
use Tests\TestCase;

class SourceRefTest extends TestCase
{
    use Datatable, DestroyForm, CreateForm, EditForm, RefreshDatabase;

    private $permissionGroup = 'source_ref';
    private $testModel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed()
            ->actingAs(User::first());

        $this->testModel = SourceRef::factory()->make();
    }

    /** @test */
    public function can_view_create_source_ref()
    {
        $this->get(route($this->permissionGroup.'.create', false))
            ->assertStatus(200)
            ->assertJsonStructure(['form']);
    }

    /** @test */
    public function can_store_source_ref()
    {
        $response = $this->post(
            route('source_ref.store', [], false),
            $this->testModel->toArray() + []
        );

        $source_ref = SourceRef::where('gid', $this->testModel->gid)->first();

        $response->assertStatus(200)
            ->assertJsonStructure(['message'])
            ->assertJsonFragment([
                'redirect' => 'source_ref.edit',
                'param' => ['source_ref' => $source_ref->id],
            ]);
    }

    /** @test */
    public function can_update_source_ref()
    {
        $this->testModel->save();

        $this->testModel->gid = 'updated';

        $this->patch(
            route('source_ref.update', $this->testModel->id, false),
            $this->testModel->toArray() + []
        )->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertEquals('updated', $this->testModel->fresh()->gid);
    }

    /** @test */
    public function get_option_list()
    {
        $this->testModel->save();

        $this->get(route('source_ref.options', [
            'query' => $this->testModel->gid,
            'limit' => 10,
        ], false))
            ->assertStatus(200)
            ->assertJsonFragment(['gid' => $this->testModel->gid]);
    }
}
