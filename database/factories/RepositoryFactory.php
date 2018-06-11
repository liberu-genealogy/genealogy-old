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

$factory->define(App\Repository::class, function (Faker\Generator $faker) {
    return [
        'name'        => $faker->sentence,
        'description' => $faker->text,
        'is_active'   => $faker->boolean,
        'type_id'     => $faker->numberBetween($min = 1, $max = 20),

    ];
});
