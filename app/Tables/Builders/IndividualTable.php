<?php

namespace App\Tables\Builders;

use App\Individual;
use LaravelEnso\VueDatatable\app\Classes\Table;

class IndividualTable extends Table
{
    protected $templatePath = __DIR__.'/../Templates/individuals.json';

    public function query()
    {
        return Individual::select(\DB::raw('
            id as "dtRowId", first_name, last_name, gender
        '));
    }
}
