<?php

namespace Tests\Feature;

use App\Models\Addr;
use LaraveEnso\countries\src\Models\Country;
use LaraveEnso\post\src\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
// use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Tests\TestCase;

/**
 * Class AddrTest
 * @package Tests\Feature
 */
class AddrTest extends TestCase {

    use WithoutMiddleware, RefreshDatabase;

    public function testAddrIsCreatedSuccessfully() {

        $adr = Addr::create(Addr::factory()->make()->getAttributes());
        // $adr2 = Addr::create(Addr::factory()->make()->getAttributes());

        $payload = [
            'adr1'      => $adr->id,
            'adr2'      => $adr->id,
            'city'      => $adr->id,
            'post'      => $adr->id,
            'ctry'      => $adr->id,
            'stae'      => rand(0000, 9999)
        ];
        $this->json('post', 'api/addrs', $payload)
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

    public function testIndexReturnsDataInValidFormat() {

        $this->json('get', 'api/addrs')
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

    public function testStoreWithMissingData() {

        $payload = [
            'stae' => rand(0000, 9999)
        ];
        $this->json('post', 'api/addrs', $payload)
            ->assertStatus(Response::HTTP_BAD_REQUEST)
            ->assertJsonStructure(['error']);
    }

    public function testStoreWithMissingAddrAndAdr2() {

        $payload = [
            'adr1'     => 0,
            'adr2' => 0,
            'stae'      => rand(0000, 9999)
        ];
        $this->json('post', 'api/addrs', $payload)
            ->assertStatus(Response::HTTP_NOT_FOUND)
            ->assertJsonStructure(['error']);
    }

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

        $this->json('get', "api/addrs/$addr->id")
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

    public function testShowMissingAddr() {

        $this->json('get', "api/addrs/0")
            ->assertStatus(Response::HTTP_NOT_FOUND)
            ->assertJsonStructure(['error']);
    }

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
        $this->json('delete', "api/addrs/$addr->id")
            ->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

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

        $this->json('put', "api/addrs/$addr->id", $payload)
            ->assertStatus(Response::HTTP_UNAUTHORIZED);
    }
}
