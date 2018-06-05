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
        factory(App\Individual::class, 250)->create();
    }
}
