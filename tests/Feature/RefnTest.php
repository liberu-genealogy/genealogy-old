<?php

namespace Tests\Feature;

use App\Models\Refn;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelEnso\Forms\TestTraits\CreateForm;
use LaravelEnso\Forms\TestTraits\DestroyForm;
use LaravelEnso\Forms\TestTraits\EditForm;
use LaravelEnso\Tables\Traits\Tests\Datatable;
use LaravelEnso\Users\Models\User;
use Tests\TestCase;

class RefnTest extends TestCase
{
    use Datatable, DestroyForm, CreateForm, EditForm, RefreshDatabase;

    private $permissionGroup = 'refn';
    private $testModel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed()
            ->actingAs(User::first());

        $this->testModel = Refn::factory()->make();
    }

    /** @test */
    public function can_view_create_refn()
    {
        $this->get(route($this->permissionGroup.'.create', false))
            ->assertStatus(200)
            ->assertJsonStructure(['form']);
    }

    /** @test */
    public function can_store_refn()
    {
        $response = $this->post(
            route('refn.store', [], false),
            $this->testModel->toArray() + []
        );

        $refn = Refn::where('gid', $this->testModel->gid)->first();

        $response->assertStatus(200)
            ->assertJsonStructure(['message'])
            ->assertJsonFragment([
                'redirect' => 'refn.edit',
                'param' => ['refn' => $refn->id],
            ]);
    }

    /** @test */
    public function can_update_refn()
    {
        $this->testModel->save();

        $this->testModel->gid = 'updated';

        $this->patch(
            route('refn.update', $this->testModel->id, false),
            $this->testModel->toArray() + []
        )->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertEquals('updated', $this->testModel->fresh()->gid);
    }

    /** @test */
    public function get_option_list()
    {
        $this->testModel->save();

        $this->get(route('refn.options', [
            'query' => $this->testModel->refn,
            'limit' => 10,
        ], false))
            ->assertStatus(200)
            ->assertJsonFragment(['refn' => $this->testModel->refn]);
    }
}
