<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelEnso\Forms\TestTraits\CreateForm;
use LaravelEnso\Forms\TestTraits\DestroyForm;
use LaravelEnso\Forms\TestTraits\EditForm;
use LaravelEnso\Tables\Traits\Tests\Datatable;
use LaravelEnso\Users\Models\User;
use App\Models\SourceDataEvent;
use Tests\TestCase;

class SourceDataEventTest extends TestCase {

    use Datatable, DestroyForm, CreateForm, EditForm, RefreshDatabase;

    private $permissionGroup = 'source_data_even';
    private $testModel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed()
            ->actingAs(User::first());

        $this->testModel = SourceDataEvent::factory()->make();
    }

    /** @test */
    public function can_view_create_source_data_even()
    {
        $this->get(route($this->permissionGroup.'.create', false))
            ->assertStatus(200)
            ->assertJsonStructure(['form']);
    }

    /** @test */
    public function can_store_source_data_even()
    {
        $response = $this->post(
            route('source_data_even.store', [], false),
            $this->testModel->toArray() + []
        );

        $source_data_even = SourceDataEvent::where('gid', $this->testModel->gid)->first();

        $response->assertStatus(200)
            ->assertJsonStructure(['message'])
            ->assertJsonFragment([
                'redirect' => 'source_data_even.edit',
                'param' => ['source_data_even' => $source_data_even->id],
            ]);
    }

    /** @test */
    public function can_update_source_data()
    {
        $this->testModel->save();

        $this->testModel->gid = 'updated';

        $this->patch(
            route('source_data_even.update', $this->testModel->id, false),
            $this->testModel->toArray() + []
        )->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertEquals('updated', $this->testModel->fresh()->gid);
    }

    /** @test */
    public function get_option_list()
    {
        $this->testModel->save();

        $this->get(route('source_data_even.options', [
            'query' => $this->testModel->gid,
            'limit' => 10,
        ], false))
            ->assertStatus(200)
            ->assertJsonFragment(['gid' => $this->testModel->gid]);
    }
}
