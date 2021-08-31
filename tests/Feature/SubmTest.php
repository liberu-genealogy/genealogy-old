<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelEnso\Forms\TestTraits\CreateForm;
use LaravelEnso\Forms\TestTraits\DestroyForm;
use LaravelEnso\Forms\TestTraits\EditForm;
use LaravelEnso\Tables\Traits\Tests\Datatable;
use LaravelEnso\Users\Models\User;
use App\Models\Subm;
use Tests\TestCase;

class SubmTest extends TestCase {

    use Datatable, DestroyForm, CreateForm, EditForm, RefreshDatabase;

    private $permissionGroup = 'subms';
    private $testModel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed()
            ->actingAs(User::first());

        $this->testModel = Subm::factory()->make();
    }

    /** @test */
    public function can_view_create_subms()
    {
        $this->get(route($this->permissionGroup.'.create', false))
            ->assertStatus(200)
            ->assertJsonStructure(['form']);
    }

    /** @test */
    public function can_store_subms()
    {
        $response = $this->post(
            route('subms.store', [], false),
            $this->testModel->toArray() + []
        );

        $subms = Subm::where('gid', $this->testModel->gid)->first();

        $response->assertStatus(200)
            ->assertJsonStructure(['message'])
            ->assertJsonFragment([
                'redirect' => 'subms.edit',
                'param' => ['subms' => $subms->id],
            ]);
    }

    /** @test */
    public function can_update_subms()
    {
        $this->testModel->save();

        $this->testModel->gid = 'updated';

        $this->patch(
            route('subms.update', $this->testModel->id, false),
            $this->testModel->toArray() + []
        )->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertEquals('updated', $this->testModel->fresh()->gid);
    }

    /** @test */
    public function get_option_list()
    {
        $this->testModel->save();

        $this->get(route('subms.options', [
            'query' => $this->testModel->gid,
            'limit' => 10,
        ], false))
            ->assertStatus(200)
            ->assertJsonFragment(['gid' => $this->testModel->gid]);
    }
}
