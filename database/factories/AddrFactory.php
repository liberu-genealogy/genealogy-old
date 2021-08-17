<?php

namespace Database\Factories;

use App\Models\Addr;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddrFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Addr::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'adr1' => $this->faker->address,
            'adr2' => $this->faker->address,
            'city' => $this->faker->city,
            'stae' => $this->faker->state,
            'post' => $this->faker->postcode,
            'ctry' => $this->faker->countryCode,
        ];
    }
}
