<?php

namespace Database\Factories;

use App\Models\PersonAlia;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonAliaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PersonAlia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'group' => $this->faker->word(), 'gid' => $this->faker->randomElement('1', '2'),
            $this->faker->word(), 'import_confirm', 'created_at', 'updated_at'
        ];
    }
}
