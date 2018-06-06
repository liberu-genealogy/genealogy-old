<?php

use Illuminate\Database\Seeder;
use App\EventType;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories = ['birth', 'marriage', 'death'];
        foreach ($categories as $category)
            EventType::create(['name' => $category, 'description' => 'Description of event']);


        factory(App\Event::class, 100)->create();
    }
}
