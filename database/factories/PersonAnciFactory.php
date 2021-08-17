<?php

namespace Database\Factories;

use App\Models\PersonAnci;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonAnciFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PersonAnci::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'group' => $this->faker->word(), 'gid' => $this->faker->randomElement('1', '2'), 'anci' => $this->faker->word(), 'created_at', 'updated_at'
        ];
    }
}
