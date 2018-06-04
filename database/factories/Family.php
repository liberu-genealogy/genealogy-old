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

$factory->define(App\Family::class, function (Faker\Generator $faker) {
    return [
        'description' => $faker->text,
        'partner_1_id' => $faker->randomElement(\App\Individual::pluck('id')->toArray()),
        'partner_2_id' => $faker->randomElement(\App\Individual::pluck('id')->toArray()),
        'is_active' => $faker->boolean,
    ];
});
