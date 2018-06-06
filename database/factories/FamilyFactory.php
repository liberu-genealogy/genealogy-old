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
        'is_active' => $faker->boolean,
        'type_id'=> 1,
        'father_id' => $faker->randomElement(\App\Individual::where('gender', 'male')->pluck('id')->toArray()),
        'mother_id' => $faker->randomElement(\App\Individual::where('gender', 'female')->pluck('id')->toArray()),

    ];
});
