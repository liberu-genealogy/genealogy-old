<?php

namespace Database\Factories;

use App\Models\Addr;
use App\Models\Repository;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

class RepositoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Repository::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'repo' => $this->faker->word(),
            'name' => $this->faker->word(),
            'addr_id' => Addr::factory(),
            'rin' => $this->faker->word(),
            'phon' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'fax',
            'www' => $this->faker->url(),
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'type_id' => Type::factory(),
            'is_active'
        ];
    }
}
