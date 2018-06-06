<?php

use Illuminate\Database\Seeder;

class CitationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Citation::class, 250)->create();
    }
}
