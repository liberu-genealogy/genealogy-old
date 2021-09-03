<?php

namespace Tests\Feature;

use App\Models\FamilySlgs;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelEnso\Forms\TestTraits\CreateForm;
use LaravelEnso\Forms\TestTraits\DestroyForm;
use LaravelEnso\Forms\TestTraits\EditForm;
use LaravelEnso\Tables\Traits\Tests\Datatable;
use LaravelEnso\Users\Models\User;
use Tests\TestCase;

class FamilySlgsTest extends TestCase
{
    use Datatable, DestroyForm, CreateForm, EditForm, RefreshDatabase;

    private $permissionGroup = 'familyslugs';
    private $testModel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed()
            ->actingAs(User::first());

        $this->testModel = FamilySlgs::factory()->make();
    }

    /** @test */
    public function can_view_create_family_slgs()
    {
        $this->get(route($this->permissionGroup.'.create', false))
            ->assertStatus(200)
            ->assertJsonStructure(['form']);
    }

    /** @test */
    public function can_store_family_slgs()
    {
        $response = $this->post(
            route('familyslugs.store', [], false),
            $this->testModel->toArray() + []
        );

        $family_slgs = FamilySlgs::where('family_id', $this->testModel->family_id)->first();

        $response->assertStatus(200)
            ->assertJsonStructure(['message'])
            ->assertJsonFragment([
                'redirect' => 'familyslugs.edit',
                'param' => ['family_slg' => $family_slgs->id],
            ]);
    }

    /** @test */
    public function can_update_family()
    {
        $this->testModel->save();

        $this->testModel->family_id = 'updated';

        $this->patch(
            route('familyslugs.update', $this->testModel->id, false),
            $this->testModel->toArray() + []
        )->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertEquals('updated', $this->testModel->fresh()->family_id);
    }

    /** @test */
    public function get_option_list()
    {
        $this->testModel->save();

        $this->get(route('familyslugs.options', [
            'query' => $this->testModel->stat,
            'limit' => 10,
        ], false))
            ->assertStatus(200)
            ->assertJsonFragment(['stat' => $this->testModel->stat]);
    }
}
