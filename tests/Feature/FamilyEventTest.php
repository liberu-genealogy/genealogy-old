<?php

namespace Tests\Feature;

use App\Models\FamilyEvent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelEnso\Forms\TestTraits\CreateForm;
use LaravelEnso\Forms\TestTraits\DestroyForm;
use LaravelEnso\Forms\TestTraits\EditForm;
use LaravelEnso\Tables\Traits\Tests\Datatable;
use LaravelEnso\Users\Models\User;
use Tests\TestCase;

class FamilyEventTest extends TestCase
{
    use Datatable, DestroyForm, CreateForm, EditForm, RefreshDatabase;

    private $permissionGroup = 'familyevents';
    private $testModel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed()
            ->actingAs(User::first());

        $this->testModel = FamilyEvent::factory()->make();
    }

    /** @test */
    public function can_view_create_family_event()
    {
        $this->get(route($this->permissionGroup.'.create', false))
            ->assertStatus(200)
            ->assertJsonStructure(['form']);
    }

    /** @test */
    public function can_store_family_event()
    {
        $response = $this->post(
            route('familyevents.store', [], false),
            $this->testModel->toArray() + []
        );

        $family_event = FamilyEvent::where('family_id', $this->testModel->family_id)->first();

        $response->assertStatus(200)
            ->assertJsonStructure(['message'])
            ->assertJsonFragment([
                'redirect' => 'familyevents.edit',
                'param' => ['family_event' => $family_event->id],
            ]);
    }

    /** @test */
    public function can_update_family()
    {
        $this->testModel->save();

        $this->testModel->title = 'updated';

        $this->patch(
            route('familyevents.update', $this->testModel->id, false),
            $this->testModel->toArray() + []
        )->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertEquals('updated', $this->testModel->fresh()->title);
    }

    /** @test */
    public function get_option_list()
    {
        $this->testModel->save();

        $this->get(route('familyevents.options', [
            'query' => $this->testModel->title,
            'limit' => 10,
        ], false))
            ->assertStatus(200)
            ->assertJsonFragment(['title' => $this->testModel->title]);
    }
}
