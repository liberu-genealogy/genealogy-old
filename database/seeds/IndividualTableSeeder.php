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
       // factory(App\Individual::class, 50)->create();

        factory(App\Individual::class, 100)
            ->create()
            ->each(function ($u) {
                App\Person::create(['name' => $u->first_name.' '.$u->last_name]);
                $id = App\Individual::where('first_name', '=', $u->first_name)->where('last_name', '=', $u->last_name)
                ->pluck('id')->first();
            });

        // Get all the parents attaching up to 2 random parents to each user
        $parents = App\Individual::all();

        // Populate the pivot table
        App\Individual::all()->each(function ($user) use ($parents) {
            $user->parents()->attach(
                $parents->random(rand(1, 2))->unique()->pluck('id')->toArray()
            );

        });

        $parents = App\Person::all();

        // Populate the relationships
        App\Person::all()->each(function ($user) use ($parents) {
            $user->father()->associate(
                $parents->random()->first()
            )->save();

             $user->mother()->associate(
                 $parents->random()->first()
             )->save();


        });


    }
}
