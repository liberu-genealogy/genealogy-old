<?php

namespace Tests\Feature;

use App\Models\SourceData;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelEnso\Forms\TestTraits\CreateForm;
use LaravelEnso\Forms\TestTraits\DestroyForm;
use LaravelEnso\Forms\TestTraits\EditForm;
use LaravelEnso\Tables\Traits\Tests\Datatable;
use LaravelEnso\Users\Models\User;
use Tests\TestCase;

class SourceDataTest extends TestCase
{
    use Datatable, DestroyForm, CreateForm, EditForm, RefreshDatabase;

    private $permissionGroup = 'sourcedata';
    private $testModel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed()
            ->actingAs(User::first());

        $this->testModel = SourceData::factory()->make();
    }

    /** @test */
    public function can_view_create_source_data()
    {
        $this->get(route($this->permissionGroup.'.create', false))
            ->assertStatus(200)
            ->assertJsonStructure(['form']);
    }

    /** @test */
    public function can_store_source_data()
    {
        $response = $this->post(
            route('sourcedata.store', [], false),
            $this->testModel->toArray() + []
        );

        $source_data = SourceData::where('gid', $this->testModel->gid)->first();

        $response->assertStatus(200)
            ->assertJsonStructure(['message'])
            ->assertJsonFragment([
                'redirect' => 'sourcedata.edit',
                'param' => ['sourceData' => $source_data->id],
            ]);
    }

    /** @test */
    public function can_update_source_data()
    {
        $this->testModel->save();

        $this->testModel->gid = 'updated';

        $this->patch(
            route('sourcedata.update', $this->testModel->id, false),
            $this->testModel->toArray() + []
        )->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertEquals('updated', $this->testModel->fresh()->gid);
    }

    /** @test */
    public function get_option_list()
    {
        $this->testModel->save();

        $this->get(route('sourcedata.options', [
            'query' => $this->testModel->group,
            'limit' => 10,
        ], false))
            ->assertStatus(200)
            ->assertJsonFragment(['group' => $this->testModel->group]);
    }
}
