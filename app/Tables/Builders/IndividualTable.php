<?php

namespace App\Tables\Builders;

use App\Individual;
use LaravelEnso\VueDatatable\app\Classes\Table;

class IndividualTable extends Table
{
    protected $templatePath = __DIR__.'/../Templates/individuals.json';

    public function query()
    {
        return Individual::join('events', function ($join) {
            $join->on('individuals.id', '=', 'events.id')
                ->where('events.event_type', '=', 'App\Individual')
                ->where('events.event_type_id', '=', 1);
        })
        ->select(\DB::raw('
            individuals.id as "dtRowId", individuals.first_name, individuals.last_name, individuals.gender, individuals.is_active, events.date
            '));
    }
}
