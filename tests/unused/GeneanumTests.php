<?php

namespace Tests\Feature;

use App\Models\Geneanum;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelEnso\Forms\TestTraits\CreateForm;
use LaravelEnso\Forms\TestTraits\DestroyForm;
use LaravelEnso\Forms\TestTraits\EditForm;
use LaravelEnso\Tables\Traits\Tests\Datatable;
use LaravelEnso\Users\Models\User;
use Tests\TestCase;

class GeneanumTest extends TestCase
{
    use Datatable, DestroyForm, CreateForm, EditForm, RefreshDatabase;

    private $permissionGroup = 'geneanums';
    private $testModel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed()
            ->actingAs(User::first());

        $this->testModel = Geneanum::factory()->make();
    }

    /** @test */
    public function can_view_create_geneanum()
    {
        $this->get(route($this->permissionGroup.'.create', false))
            ->assertStatus(200)
            ->assertJsonStructure(['form']);
    }

    /** @test */
    public function can_store_geneanum()
    {
        $response = $this->post(
            route('geneanums.store', [], false),
            $this->testModel->toArray() + []
        );

        $geneanum = Geneanum::where('remote_id', $this->testModel->remote_id)->first();

        $response->assertStatus(200)
            ->assertJsonStructure(['message'])
            ->assertJsonFragment([
                'redirect' => 'geneanums.edit',
                'param' => ['geneanum' => $geneanum->id],
            ]);
    }

    /** @test */
    public function can_update_geneanum()
    {
        $this->testModel->save();

        $this->testModel->remote_id = 'updated';

        $this->patch(
            route('geneanum.update', $this->testModel->id, false),
            $this->testModel->toArray() + []
        )->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertEquals('updated', $this->testModel->fresh()->remote_id);
    }

    /** @test */
    public function get_option_list()
    {
        $this->testModel->save();

        $this->get(route('geneanums.options', [
            'query' => $this->testModel->remote_id,
            'limit' => 10,
        ], false))
            ->assertStatus(200)
            ->assertJsonFragment(['remote_id' => $this->testModel->remote_id]);
    }
}
