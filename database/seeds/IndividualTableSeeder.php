<?php

use Illuminate\Database\Seeder;

class IndividualTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

// Populate individuals
        factory(App\Individual::class, 50)->create();

        // Get all the parents attaching up to 3 random parents to each user
        $parents = App\Individual::all();

        // Populate the pivot table
        App\Individual::all()->each(function ($user) use ($parents) {
            $user->parents()->attach(
                $parents->random(rand(1, 2))->pluck('id')->toArray()
            );
        });
    }
}
