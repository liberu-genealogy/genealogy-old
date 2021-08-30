<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelEnso\Forms\TestTraits\CreateForm;
use LaravelEnso\Forms\TestTraits\DestroyForm;
use LaravelEnso\Forms\TestTraits\EditForm;
use LaravelEnso\Tables\Traits\Tests\Datatable;
use LaravelEnso\Users\Models\User;
use App\Models\FamilyEvent;
use Tests\TestCase;

class FamilyEventTest extends TestCase {

    use Datatable, DestroyForm, CreateForm, EditForm, RefreshDatabase;

    private $permissionGroup = 'family_events';
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
            route('family_events.store', [], false),
            $this->testModel->toArray() + []
        );

        $family_event = FamilyEvent::where('family_id', $this->testModel->family_id)->first();

        $response->assertStatus(200)
            ->assertJsonStructure(['message'])
            ->assertJsonFragment([
                'redirect' => 'family_events.edit',
                'param' => ['family_event' => $family_event->id],
            ]);
    }

    /** @test */
    public function can_update_family()
    {
        $this->testModel->save();

        $this->testModel->family_id = 'updated';

        $this->patch(
            route('family_events.update', $this->testModel->id, false),
            $this->testModel->toArray() + []
        )->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertEquals('updated', $this->testModel->fresh()->family_id);
    }

    /** @test */
    public function get_option_list()
    {
        $this->testModel->save();

        $this->get(route('family_events.options', [
            'query' => $this->testModel->family_id,
            'limit' => 10,
        ], false))
            ->assertStatus(200)
            ->assertJsonFragment(['family_id' => $this->testModel->family_id]);
    }
}
