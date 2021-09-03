<?php

namespace Tests\Feature;

use App\Models\PersonEvent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelEnso\Forms\TestTraits\CreateForm;
use LaravelEnso\Forms\TestTraits\DestroyForm;
use LaravelEnso\Forms\TestTraits\EditForm;
use LaravelEnso\Tables\Traits\Tests\Datatable;
use LaravelEnso\Users\Models\User;
use Tests\TestCase;

class PersonEventTest extends TestCase
{
    use Datatable, DestroyForm, CreateForm, EditForm, RefreshDatabase;

    private $permissionGroup = 'personevent';
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
            route('personevent.store', [], false),
            $this->testModel->toArray() + []
        );

        $person_events = PersonEvent::where('title', $this->testModel->title)->first();

        $response->assertStatus(200)
            ->assertJsonStructure(['message'])
            ->assertJsonFragment([
                'redirect' => 'personevent.edit',
                'param' => ['person_event' => $person_events->id],
            ]);
    }

    /** @test */
    public function can_update_person_event()
    {
        $this->testModel->save();

        $this->testModel->title = 'updated';

        $this->patch(
            route('personevent.update', $this->testModel->id, false),
            $this->testModel->toArray() + []
        )->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertEquals('updated', $this->testModel->fresh()->title);
    }

    /** @test */
    public function get_option_list()
    {
        $this->testModel->save();

        $this->get(route('personevent.options', [
            'query' => $this->testModel->title,
            'limit' => 10,
        ], false))
            ->assertStatus(200)
            ->assertJsonFragment(['title' => $this->testModel->title]);
    }
}
