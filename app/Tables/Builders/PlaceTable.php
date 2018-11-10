<?php

namespace App\Tables\Builders;

use App\Place;
use LaravelEnso\VueDatatable\app\Classes\Table;

class PlaceTable extends Table
{
    protected $templatePath = __DIR__.'/../Templates/places.json';

    public function query()
    {
        return Place::select(\DB::raw('
            places.id as "dtRowId"
        '));
    }
}
