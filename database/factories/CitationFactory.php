<?php

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
