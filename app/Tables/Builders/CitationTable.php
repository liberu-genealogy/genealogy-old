<?php

namespace App\Tables\Builders;

use App\Citation;
use LaravelEnso\VueDatatable\app\Classes\Table;

class CitationTable extends Table
{
    protected $templatePath = __DIR__.'/../Templates/citations.json';

    public function query()
    {
        return Citation::select(\DB::raw('
            citations.id as "dtRowId"
        '));
    }
}
