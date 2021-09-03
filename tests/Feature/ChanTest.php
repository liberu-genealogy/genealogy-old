<?php

namespace Tests\Feature;

use App\Models\Chan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelEnso\Forms\TestTraits\CreateForm;
use LaravelEnso\Forms\TestTraits\DestroyForm;
use LaravelEnso\Forms\TestTraits\EditForm;
use LaravelEnso\Tables\Traits\Tests\Datatable;
use LaravelEnso\Users\Models\User;
use Tests\TestCase;

class ChanTest extends TestCase
{
    use Datatable, DestroyForm, CreateForm, EditForm, RefreshDatabase;

    private $permissionGroup = 'chan';
    private $testModel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed()
            ->actingAs(User::first());

        $this->testModel = Chan::factory()->make();
    }

    /** @test */
    public function can_view_create_form()
    {
        $this->get(route($this->permissionGroup.'.create', false))
            ->assertStatus(200)
            ->assertJsonStructure(['form']);
    }

    /** @test */
    public function can_store_chan()
    {
        $response = $this->post(
            route('chan.store', [], false),
            $this->testModel->toArray() + []
        );

        $chan = Chan::where('gid', $this->testModel->gid)->first();

        $response->assertStatus(200)
            ->assertJsonStructure(['message'])
            ->assertJsonFragment([
                'redirect' => 'chan.edit',
                'param' => ['chan' => $chan->id],
            ]);
    }

    /** @test */
    public function can_update_chan()
    {
        $this->testModel->save();

        $this->testModel->gid = 'updated';

        $this->patch(
            route('chan.update', $this->testModel->id, false),
            $this->testModel->toArray() + []
        )->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertEquals('updated', $this->testModel->fresh()->gid);
    }

    /** @test */
    public function get_option_list()
    {
        $this->testModel->save();

        $this->get(route('chan.options', [
            'query' => $this->testModel->group,
            'limit' => 10,
        ], false))
            ->assertStatus(200)
            ->assertJsonFragment(['group' => $this->testModel->group]);
    }
}
