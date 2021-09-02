<?php

namespace Tests\Feature;

use App\Models\SourceDataEven;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelEnso\Forms\TestTraits\CreateForm;
use LaravelEnso\Forms\TestTraits\DestroyForm;
use LaravelEnso\Forms\TestTraits\EditForm;
use LaravelEnso\Tables\Traits\Tests\Datatable;
use LaravelEnso\Users\Models\User;
use Tests\TestCase;

class SourceDataEvenTest extends TestCase
{
    use Datatable, DestroyForm, CreateForm, EditForm, RefreshDatabase;

    private $permissionGroup = 'sourcedataeven';
    private $testModel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed()
            ->actingAs(User::first());

        $this->testModel = SourceDataEven::factory()->make();
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
            route('sourcedataeven.store', [], false),
            $this->testModel->toArray() + []
        );

        $sourcedataeven = SourceDataEven::where('plac', $this->testModel->plac)->first();

        $response->assertStatus(200)
            ->assertJsonStructure(['message'])
            ->assertJsonFragment([
                'redirect' => 'sourcedataeven.edit',
                'param' => ['sourcedataeven' => $sourcedataeven->id],
            ]);
    }

    /** @test */
    public function can_update_source_data()
    {
        $this->testModel->save();

        $this->testModel->plac = 'updated';

        $this->patch(
            route('sourcedataeven.update', $this->testModel->id, false),
            $this->testModel->toArray() + []
        )->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertEquals('updated', $this->testModel->fresh()->plac);
    }

    /** @test */
    public function get_option_list()
    {
        $this->testModel->save();

        $this->get(route('sourcedataeven.options', [
            'query' => $this->testModel->group,
            'limit' => 10,
        ], false))
            ->assertStatus(200)
            ->assertJsonFragment(['group' => $this->testModel->group]);
    }
}
