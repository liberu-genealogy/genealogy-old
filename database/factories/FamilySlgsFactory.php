<?php

namespace Database\Factories;

use App\Models\Family;
use App\Models\FamilySlgs;
use Illuminate\Database\Eloquent\Factories\Factory;

class FamilySlgsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FamilySlgs::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'family_id' => Family::factory(), 'stat' => $this->faker->words(),
            'date' => $this->faker->date(), 'plac' => $this->faker->word(), 'temp' => $this->faker->word(), 'created_at', 'updated_at'
        ];
    }
}
