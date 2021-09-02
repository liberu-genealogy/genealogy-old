<?php

namespace Tests\Feature;

use App\Models\Subn;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelEnso\Forms\TestTraits\CreateForm;
use LaravelEnso\Forms\TestTraits\DestroyForm;
use LaravelEnso\Forms\TestTraits\EditForm;
use LaravelEnso\Tables\Traits\Tests\Datatable;
use LaravelEnso\Users\Models\User;
use Tests\TestCase;

class SubnTest extends TestCase
{
    use Datatable, DestroyForm, CreateForm, EditForm, RefreshDatabase;

    private $permissionGroup = 'subn';
    private $testModel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed()
            ->actingAs(User::first());

        $this->testModel = Subn::factory()->make();
    }

    /** @test */
    public function can_view_create_subn()
    {
        $this->get(route($this->permissionGroup.'.create', false))
            ->assertStatus(200)
            ->assertJsonStructure(['form']);
    }

    /** @test */
    public function can_store_subn()
    {
        $response = $this->post(
            route('subn.store', [], false),
            $this->testModel->toArray() + []
        );

        $subn = Subn::where('subm', $this->testModel->subm)->first();

        $response->assertStatus(200)
            ->assertJsonStructure(['message'])
            ->assertJsonFragment([
                'redirect' => 'subn.edit',
                'param' => ['subn' => $subn->id],
            ]);
    }

    /** @test */
    public function can_update_subn()
    {
        $this->testModel->save();

        $this->testModel->subm = 'updated';

        $this->patch(
            route('subn.update', $this->testModel->id, false),
            $this->testModel->toArray() + []
        )->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertEquals('updated', $this->testModel->fresh()->subm);
    }

    /** @test */
    public function get_option_list()
    {
        $this->testModel->save();

        $this->get(route('subn.options', [
            'query' => $this->testModel->subm,
            'limit' => 10,
        ], false))
            ->assertStatus(200)
            ->assertJsonFragment(['subm' => $this->testModel->subm]);
    }
}
