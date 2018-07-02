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

$factory->define(App\Citation::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence,
        'description' => $faker->text,
        'is_active' => $faker->boolean,
        'volume_id' => $faker->numberBetween($min = 1, $max = 20),
        'page_id' => $faker->numberBetween($min = 1, $max = 20),
        'date' => $faker->dateTimeBetween($startDate = '-200 years', $endDate = 'now'),
        'source_id' => $faker->randomElement(\App\Source::pluck('id')->toArray()),
        'confidence' => $faker->randomDigit(),

    ];
});
