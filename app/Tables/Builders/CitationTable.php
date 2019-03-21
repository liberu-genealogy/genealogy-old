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
            citations.id as "dtRowId", citations.name as name, citations.description as description, citations.is_active as is_active, citations.date as date, citations.created_at as created_at, sources.name as source
        \'))->join(\'sources\', \'citations.source_id\', \'=\', \'sources.id\');
        '));
    }
}
