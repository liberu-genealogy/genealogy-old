<?php

namespace Database\Factories;

use App\Models\Chan;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Chan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'group' => $this->faker->word(), 'gid' => $this->faker->randomElement(1, 2), 'date' => $this->faker->date(), 'time' => $this->faker->time(), 'created_at', 'updated_at'
        ];
    }
}
