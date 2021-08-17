<?php

namespace Database\Factories;

use App\Models\Citation;
use App\Models\Repository;
use Illuminate\Database\Eloquent\Factories\Factory;

class CitationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Citation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(), 'description' => $this->faker->text(),
            'repository_id' => Repository::factory(),
            'volume' => $this->faker->randomElement(1, 2, 3, 4, 5),
            'page' => $this->faker->randomNumber(500), 'is_active',
            'confidence' => $this->faker->word(),
            'source_id' => $this->faker->randomElement(1, 2, 3, 4)

        ];
    }
}
