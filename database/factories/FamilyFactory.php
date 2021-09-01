<?php

namespace Database\Factories;

use App\Models\Family;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

class FamilyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Family::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->text(),
            'is_active' => $this->faker->randomDigit(0,1),
            'husband_id'=> $this->faker->randomDigit(1, 2, 3),
            'wife_id'=>  $this->faker->randomDigit(1, 2, 3),
            'type_id' => Type::factory(),
            'chan' => $this->faker->words(),
            'nchi' => $this->faker->words(),
            'rin' => $this->faker->word(),
        ];
    }
}
