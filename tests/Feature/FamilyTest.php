<?php

namespace Tests\Feature;

use App\Models\Family;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelEnso\Forms\TestTraits\CreateForm;
use LaravelEnso\Forms\TestTraits\DestroyForm;
use LaravelEnso\Forms\TestTraits\EditForm;
use LaravelEnso\Tables\Traits\Tests\Datatable;
use LaravelEnso\Users\Models\User;
use Tests\TestCase;

class FamilyTest extends TestCase
{
    use Datatable, DestroyForm, CreateForm, EditForm, RefreshDatabase;

    private $permissionGroup = 'families';
    private $testModel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed()
            ->actingAs(User::first());

        $this->testModel = Family::factory()->make();
    }

    /** @test */
    public function can_view_create_form()
    {
        $this->get(route($this->permissionGroup.'.create', false))
            ->assertStatus(200)
            ->assertJsonStructure(['form']);
    }

    /** @test */
    public function can_store_family()
    {
        $response = $this->post(
            route('families.store', [], false),
            $this->testModel->toArray() + []
        );

        $family = Family::where('type_id', $this->testModel->type_id)->first();

        $response->assertStatus(200)
            ->assertJsonStructure(['message'])
            ->assertJsonFragment([
                'redirect' => 'families.edit',
                'param' => ['family' => $family->id],
            ]);
    }

    /** @test */
    public function can_update_family()
    {
        $this->testModel->save();

        $this->testModel->description = 'updated';

        $this->patch(
            route('families.update', $this->testModel->id, false),
            $this->testModel->toArray() + []
        )->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertEquals('updated', $this->testModel->fresh()->description);
    }

    /** @test */
    public function get_option_list()
    {
        $this->testModel->save();

        $this->get(route('families.options', [
            'query' => $this->testModel->chan,
            'limit' => 10,
        ], false))
            ->assertStatus(200)
            ->assertJsonFragment(['chan' => $this->testModel->chan]);
    }
}
