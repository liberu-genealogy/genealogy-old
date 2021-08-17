<?php

namespace Database\Factories;

use App\Models\Person;
use App\Models\PersonEvent;
use App\Models\Place;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonEventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PersonEvent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'person_id' => Person::factory(),
            'title' => $this->faker->jobTitle(),
            'type' => $this->faker->jobTitle(),
            'attr' => $this->faker->text(),
            'date' => $this->faker->date(),
            'plac' => $this->faker->address(),
            'phon' => $this->faker->phoneNumber(),
            'caus' => $this->faker->text(),
            'age' => $this->faker->randomNumber(50),
            'agnc' => $this->faker->word(),
            'places_id' => Place::factory(),
            'description' => $this->faker->text(),
            'year' => $this->faker->year(),
            'month' => $this->faker->month(),
            'day' => $this->faker->dayOfMonth(),
        ];
    }
}
