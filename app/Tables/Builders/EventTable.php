<?php

namespace App\Tables\Builders;

use App\Event;
use LaravelEnso\VueDatatable\app\Classes\Table;

class EventTable extends Table
{
    protected $templatePath = __DIR__.'/../Templates/events.json';

    public function query()
    {
        return Event::select(\DB::raw('
            id as "dtRowId", description, is_active, date
        '));
    }
}
