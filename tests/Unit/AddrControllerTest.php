<?php

namespace Tests\Unit;

use App\Http\Controllers\AddrController;
use App\Models\Addr;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

/**
 * Class AddrControllerTest
 * @package Tests\Unit
 * @coversDefaultClass \App\Http\Controllers\AddrController
 */
class AddrControllerTest extends TestCase
{
    /**
     *
     */
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }

    /**
     * @test
     * @covers ::index
     */
    function it_should_return_empty_listing()
    {
        $request = new Request(
            [
                'searchTerm' => $this->faker->word,
            ]
        );
        /** @var Addr $addr */
        $addr = Addr::factory()->create();
        $addrController = new AddrController();

        $this->assertEmpty($addrController->index($request, $addr));
    }

    /**
     * @test
     * @covers ::index
     */
    function it_should_return_listing_when_given_per_page()
    {
        $searchTerm = $this->faker->word;
        $request = new Request(
            [
                'searchTerm' => $searchTerm,
                'perPage'    => 10,
            ]
        );
        /** @var Addr $addr */
        $addr = Addr::factory(['adr1' => $searchTerm])->create();
        $addrController = new AddrController();

        $this->assertNotEmpty($addrController->index($request, $addr));
    }

    /**
     * @test
     * @covers ::index
     */
    function it_should_return_listing_as_sorted_when_given_sort_and_per_page()
    {
        $searchTerm = $this->faker->word;
        $sortJson = json_encode(
            [
                'field' => 'adr1',
                'type'  => 'desc',
            ]
        );
        $request = new Request(
            [
                'searchTerm' => $searchTerm,
                'perPage'    => 10,
                'sort'       => [
                    0 => $sortJson
                ]
            ]
        );
        /** @var Addr $addr */
        $addr = Addr::factory(['adr1' => $searchTerm])->create();
        $addrController = new AddrController();

        $this->assertNotEmpty($addrController->index($request, $addr));
    }

    /**
     * @test
     * @covers ::store
     */
    function it_should_create_a_record_when_validations_pass()
    {
        $adr1 = $this->faker->word;
        $request = new Request(
            [
                'adr1' => $adr1,
                'city' => $this->faker->city,
                'stae' => $this->faker->state,
            ]
        );
        $addrController = new AddrController();

        $addrController->store($request);

        $this->assertDatabaseHas('addrs', ['adr1' => $adr1]);
    }

    /**
     * @test
     * @covers ::store
     */
    function it_should_not_create_a_record_when_validations_fail()
    {
        $request = new Request(
            [
                'city' => $this->faker->city,
            ]
        );
        $addrController = new AddrController();

        $this->expectException(ValidationException::class);

        $addrController->store($request);
    }

    /**
     * @test
     * @covers ::update
     */
    function it_should_update_a_record_when_validations_pass()
    {
        $request = new Request(
            [
                'city' => $this->faker->city,
                'stae' => $this->faker->state,
            ]
        );
        $id = Addr::factory()->create()->id;
        $addrController = new AddrController();

        $this->assertNotEmpty($addrController->update($request, $id));
    }

    /**
     * @test
     * @covers ::update
     */
    function it_should_not_update_a_record_when_validations_fail()
    {
        $id = Addr::factory()->create()->id;
        $request = new Request(
            [
                'city' => $this->faker->city,
            ]
        );
        $addrController = new AddrController();

        $this->expectException(ValidationException::class);

        $addrController->update($request, $id);
    }

    /**
     * @test
     * @covers ::update
     */
    function it_should_not_update_a_record_when_record_is_not_found()
    {
        $id = Addr::factory()->create()->id + 1;
        $request = new Request(
            [
                'city' => $this->faker->city,
            ]
        );
        $addrController = new AddrController();

        $this->expectException(ValidationException::class);

        $addrController->update($request, $id);
    }

    /**
     * @test
     * @covers ::destroy
     */
    function it_should_delete_a_record_when_record_found()
    {
        $id = Addr::factory()->create()->id;
        $addrController = new AddrController();

        $this->assertEquals('true', $addrController->destroy($id));
    }

    /**
     * @test
     * @covers ::destroy
     */
    function it_should_not_delete_a_record_when_record_not_found()
    {
        $id = Addr::factory()->create()->id + 1;
        $addrController = new AddrController();

        $this->assertEquals('false', $addrController->destroy($id));
    }

    /**
     * @test
     * @covers ::get
     */
    function it_should_return_all_the_records()
    {
        $addrController = new AddrController();

        $this->assertInstanceOf(Collection::class, $addrController->get());
    }
}
