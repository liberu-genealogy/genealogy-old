<?php

use App\EventType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('event_types')->truncate();

        EventType::create(['name' => 'Birth', 'description' => 'Birth record']);
        EventType::create(['name' => 'Marriage', 'description' => 'Marriage record']);
        EventType::create(['name' => 'Death', 'description' => 'Death record']);
    }
}
