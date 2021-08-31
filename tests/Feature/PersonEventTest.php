<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelEnso\Forms\TestTraits\CreateForm;
use LaravelEnso\Forms\TestTraits\DestroyForm;
use LaravelEnso\Forms\TestTraits\EditForm;
use LaravelEnso\Tables\Traits\Tests\Datatable;
use LaravelEnso\Users\Models\User;
use App\Models\PersonEvent;
use Tests\TestCase;

class PersonEventTest extends TestCase {

    use Datatable, DestroyForm, CreateForm, EditForm, RefreshDatabase;

    private $permissionGroup = 'person_events';
    private $testModel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed()
            ->actingAs(User::first());

        $this->testModel = PersonEvent::factory()->make();
    }

    /** @test */
    public function can_view_create_person_event()
    {
        $this->get(route($this->permissionGroup.'.create', false))
            ->assertStatus(200)
            ->assertJsonStructure(['form']);
    }

    /** @test */
    public function can_store_person_event()
    {
        $response = $this->post(
            route('person_events.store', [], false),
            $this->testModel->toArray() + []
        );

        $person_events = PersonEvent::where('person_id', $this->testModel->person_id)->first();

        $response->assertStatus(200)
            ->assertJsonStructure(['message'])
            ->assertJsonFragment([
                'redirect' => 'person_events.edit',
                'param' => ['person_event' => $person_event->id],
            ]);
    }

    /** @test */
    public function can_update_person_event()
    {
        $this->testModel->save();

        $this->testModel->person_id = 'updated';

        $this->patch(
            route('person_events.update', $this->testModel->id, false),
            $this->testModel->toArray() + []
        )->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertEquals('updated', $this->testModel->fresh()->person_id);
    }

    /** @test */
    public function get_option_list()
    {
        $this->testModel->save();

        $this->get(route('person_events.options', [
            'query' => $this->testModel->person_id,
            'limit' => 10,
        ], false))
            ->assertStatus(200)
            ->assertJsonFragment(['person_id' => $this->testModel->person_id]);
    }
}
