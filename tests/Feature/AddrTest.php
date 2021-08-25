<?php

namespace Tests\Feature;

use App\Models\Addr;
use Illuminate\Http\Response;
use Tests\TestCase;

/**
 * Class AddrTest
 * @package Tests\Feature
 */
class AddrTest extends TestCase {

    /** @test */
    public function testIndexReturnsDataInValidFormat() {

        $this->json('get', 'api/addr')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    'data' => [
                        '*' => [
                            'id',
                            'adr1',
                            'adr2',
                            'city',
                            'stae',
                            'post',
                            'ctry',
                            'created_at',
                        ]
                    ]
                ]
            );
    }

    /** @test */
    public function testAddrIsCreatedSuccessfully() {

        $adr = Addr::create(Addr::factory()->make()->getAttributes());
        $payload = [
            'adr1'     => $adr->id,
            'adr2' => $adr2->id,
            'stae'      => $this->faker->randomNumber(4)
        ];
        $this->json('post', 'api/addr', $payload)
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure(
                [
                    'data' => [
                        'id',
                        'adr1',
                        'adr2',
                        'city',
                        'stae',
                        'post',
                        'created_at',
                    ]
                ]
            );
        $this->assertDatabaseHas('addrs', $payload);
    }

    /** @test */
    public function testStoreWithMissingData() {

        $payload = [
            'stae' => $this->faker->randomNumber(4)
        ];
        $this->json('post', 'api/addr', $payload)
            ->assertStatus(Response::HTTP_BAD_REQUEST)
            ->assertJsonStructure(['error']);
    }

    /** @test */
    public function testStoreWithMissingAddrAndAdr2() {

        $payload = [
            'adr1'     => 0,
            'adr2' => 0,
            'stae'      => $this->faker->randomNumber(4)
        ];
        $this->json('post', 'api/addr', $payload)
            ->assertStatus(Response::HTTP_NOT_FOUND)
            ->assertJsonStructure(['error']);
    }

    /** @test */
    public function testAddrIsShownCorrectly() {

        $addr = Addr::create(
            [
                'adr1'     => $adr,
                'adr2' => $adr2,
                'city'  => $city,
                'stae'      => $stae,
                'post'     => $post,
                'ctry'     => $ctry
            ]
        );

        $this->json('get', "api/addr/$addr->id")
            ->assertStatus(Response::HTTP_OK)
            ->assertExactJson(
                [
                    'data' => [
                        'id'          => $addr->id,
                        'adr1'     => $addr->adr->id,
                        'adr2' => $addr->adr2->id,
                        'city'  => $isSuccessful,
                        'stae'      => round($addr->stae, 2, PHP_ROUND_HALF_UP),
                        'post'     => round($addr->post, 2, PHP_ROUND_HALF_UP),
                        'ctry' => $ctry->id,
                        'created_at'  => (string)$addr->created_at,
                    ]
                ]
            );
    }

    /** @test */
    public function testShowMissingAddr() {

        $this->json('get', "api/addr/0")
            ->assertStatus(Response::HTTP_NOT_FOUND)
            ->assertJsonStructure(['error']);
    }

    /** @test */
    public function testDestroyAddr() {

        $adr = Addr::create(Addr::factory()->make()->getAttributes());
        $addr = Addr::create(
            [
                'adr1'     => $adr,
                'adr2' => $adr2,
                'city'  => $city,
                'stae'      => $stae,
                'post'     => $post,
                'ctry' => $ctry
            ]
        );
        $this->json('delete', "api/addr/$addr->id")
            ->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    /** @test */
    public function testUpdateAddr() {

        $adr = Addr::create(Addr::factory()->make()->getAttributes());
        $addr = Addr::create(
            [
                'adr1'     => $adr->id,
                'adr2' => $adr2->id,
                'city'  => $city,
                'stae'      => $stae,
                'post'     => $post,
                'ctry' => $ctry,
            ]
        );
        $payload = [
            'id'         => $addr->id,
        ];

        $this->json('put', "api/addr/$addr->id", $payload)
            ->assertStatus(Response::HTTP_UNAUTHORIZED);
    }
}
