<?php

use Illuminate\Database\Seeder;

class RepositoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Repository::class, 10)->create();
    }
}
