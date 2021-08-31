<?php

namespace Tests\Feature;

use App\Models\Addr;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelEnso\Forms\TestTraits\CreateForm;
use LaravelEnso\Forms\TestTraits\DestroyForm;
use LaravelEnso\Forms\TestTraits\EditForm;
use LaravelEnso\Tables\Traits\Tests\Datatable;
use LaravelEnso\Users\Models\User;
use Tests\TestCase;

class AddrTest extends TestCase
{
    use Datatable, DestroyForm, CreateForm, EditForm, RefreshDatabase;

    private $permissionGroup = 'addrs';
    private $testModel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed()
            ->actingAs(User::first());

        $this->testModel = Addr::factory()->make();
    }

    /** @test */
    public function can_view_create_form()
    {
        $this->get(route($this->permissionGroup.'.create', false))
            ->assertStatus(200)
            ->assertJsonStructure(['form']);
    }

    /** @test */
    public function can_store_addr()
    {
        $response = $this->post(
            route('addrs.store', [], false),
            $this->testModel->toArray() + []
        );

        $addr = Addr::where('adr1', $this->testModel->adr1)->first();

        $response->assertStatus(200)
            ->assertJsonStructure(['message'])
            ->assertJsonFragment([
                'redirect' => 'addrs.edit',
                'param' => ['addr' => $addr->id],
            ]);
    }

    /** @test */
    public function can_update_addr()
    {
        $this->testModel->save();

        $this->testModel->adr1 = 'updated';

        $this->patch(
            route('addrs.update', $this->testModel->id, false),
            $this->testModel->toArray() + []
        )->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertEquals('updated', $this->testModel->fresh()->adr1);
    }

    /** @test */
    public function get_option_list()
    {
        $this->testModel->save();

        $this->get(route('addrs.options', [
            'query' => $this->testModel->adr1,
            'limit' => 10,
        ], false))
            ->assertStatus(200)
            ->assertJsonFragment(['adr1' => $this->testModel->adr1]);
    }
}
