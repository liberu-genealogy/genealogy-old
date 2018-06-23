<?php

namespace App\Tables\Builders;

use App\Individual;
use LaravelEnso\VueDatatable\app\Classes\Table;

class IndividualTable extends Table
{
    protected $templatePath = __DIR__.'/../Templates/individuals.json';

    public function query()
    {
        return Individual::leftJoin('events as birth', function ($join) {
            $join->on('individuals.id', '=', 'birth.event_id')
                ->where('birth.event_type', '=', 'App\Individual')
                ->where('birth.event_type_id', '=', 1);
        })
            ->leftJoin('events as death', function ($join) {
                $join->on('individuals.id', '=', 'death.event_id')
                    ->where('death.event_type', '=', 'App\Individual')
                    ->where('death.event_type_id', '=', 3);
            })
        ->select(\DB::raw('
            individuals.id as "dtRowId", individuals.first_name, individuals.last_name, individuals.gender, individuals.is_active, birth.date as birth, death.date as death
            '));
    }
}
