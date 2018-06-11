<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
 */

$factory->define(App\Event::class, function (Faker\Generator $faker) {
    $event = $faker->randomElement(['App\Individual', 'App\Family']);

    return [
        'name'          => $faker->sentence,
        'description'   => $faker->text,
        'date'          => $faker->dateTimeBetween($startDate = '-200 years', $endDate = 'now'),
        'is_active'     => $faker->boolean,
        'event_type'    => $event,
        'event_id'      => $faker->unique()->randomNumber,
        'event_type_id' => $faker->randomElement(\App\Individual::pluck('id')->toArray()),
    ];
});
