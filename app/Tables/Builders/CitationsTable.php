<?php

namespace App\Tables\Builders;

use App\Citations;
use LaravelEnso\VueDatatable\app\Classes\Table;

class CitationsTable extends Table
{
    protected $templatePath = __DIR__.'/../Templates/citations.json';

    public function query()
    {
        return Citations::select(\DB::raw('
            citations.id as "dtRowId"
        '));
    }
}
