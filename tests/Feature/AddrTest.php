<?php

namespace Tests\Feature;

use Faker\Factory;
use Faker\Generator as Faker;
use App\Models\Addr as Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use LaravelEnso\Users\Models\User;
use Tests\TestCase;

class AddrTest extends TestCase {

    use WithoutMiddleware, RefreshDatabase;

    public Addr $model;

    /** @test */
    public function can_create_addr()
    {
        $params = Model::factory()->make()->getAttributes();

        $this->post(route('addrs.store'), $params)
            ->assertStatus(200)
            ->assertJsonStructure(['message']);
    }

    /** @test */
    public function can_get_addrs_index()
    {
        $route = route('addrs.index');

        $this->get($route)
            ->assert(200)
            ->assertJsonStructure(['addrs']);
    }

    /** @test */
    public function can_update_addr()
    {
        $params = Model::create(Model::factory()->make()->getAttributes());

        $addr = Model::create(
            [
                'adr1' => $params->adr1,
                'adr2' => $params->adr2,
                'city' => $params->city,
                'stae' => $params->stae,
                'post' => $params->post,
                'ctry' => $params->ctry
            ]
        );

        $route = route('addrs.update', $addr->id, false);

        $this->patch($route, $addr->toArray())
            ->assertStatus(200)
            ->assertJsonStructure(['message' => 'message']);
    }

    /** @test */
    public function can_get_create_addr_form()
    {
        $params = Model::create(Model::factory()->make()->getAttributes());

        // dd($params->toArray());

        $route = route('addrs.create');

        $this->get($route, $params->toArray())
            ->assertStatus(200)
            ->assertJsonStructure(['form' => 'form']);
    }

    /** @test */
    public function can_get_edit_addr_form()
    {
        $params = Model::create(Model::factory()->make()->getAttributes());

        $addr = Model::create(
            [
                'adr1' => $params->adr1,
                'adr2' => $params->adr2,
                'city' => $params->city,
                'stae' => $params->stae,
                'post' => $params->post,
                'ctry' => $params->ctry
            ]
        );

        $route = route('addrs.edit', $addr->id, false);

        $this->get($route, $addr->toArray())
            ->assertStatus(200)
            ->assertJsonStructure(['form' => 'form']);
    }

    /** @test */
    public function can_delete_addr()
    {
        $params = Model::create(Model::factory()->make()->getAttributes());

        $addr = Model::create(
            [
                'adr1' => $params->adr1,
                'adr2' => $params->adr2,
                'city' => $params->city,
                'stae' => $params->stae,
                'post' => $params->post,
                'ctry' => $params->ctry
            ]
        );

        $route = route('addrs.destroy', $addr->id, false);

        $this->delete($route)->assertStatus(200);

        // $this->assertNull($addr->fresh());
    }
}
