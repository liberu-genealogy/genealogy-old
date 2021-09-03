<?php

namespace Tests\Feature;

use App\Models\SourceRefEven;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelEnso\Forms\TestTraits\CreateForm;
use LaravelEnso\Forms\TestTraits\DestroyForm;
use LaravelEnso\Forms\TestTraits\EditForm;
use LaravelEnso\Tables\Traits\Tests\Datatable;
use LaravelEnso\Users\Models\User;
use Tests\TestCase;

class SourceRefEvenTest extends TestCase
{
    use Datatable, DestroyForm, CreateForm, EditForm, RefreshDatabase;

    private $permissionGroup = 'sourcerefeven';
    private $testModel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed()
            ->actingAs(User::first());

        $this->testModel = SourceRefEven::factory()->make();
    }

    /** @test */
    public function can_view_create_sourceref_even()
    {
        $this->get(route($this->permissionGroup.'.create', false))
            ->assertStatus(200)
            ->assertJsonStructure(['form']);
    }

    /** @test */
    public function can_store_sourceref_even()
    {
        $response = $this->post(
            route('sourcerefeven.store', [], false),
            $this->testModel->toArray() + []
        );

        $sourceref_even = SourceRefEven::where('gid', $this->testModel->gid)->first();

        $response->assertStatus(200)
            ->assertJsonStructure(['message'])
            ->assertJsonFragment([
                'redirect' => 'sourcerefeven.edit',
                'param' => ['sourceRefEven' => $sourceref_even->id],
            ]);
    }

    /** @test */
    public function can_update_sourceref_even()
    {
        $this->testModel->save();

        $this->testModel->gid = 'updated';

        $this->patch(
            route('sourcerefeven.update', $this->testModel->id, false),
            $this->testModel->toArray() + []
        )->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertEquals('updated', $this->testModel->fresh()->gid);
    }

    /** @test */
    public function get_option_list()
    {
        $this->testModel->save();

        $this->get(route('sourcerefeven.options', [
            'query' => $this->testModel->even,
            'limit' => 10,
        ], false))
            ->assertStatus(200)
            ->assertJsonFragment(['even' => $this->testModel->even]);
    }
}
