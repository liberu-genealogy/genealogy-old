<?php

namespace App\Tables\Builders;

use App\Citation;
use LaravelEnso\Tables\app\Services\Table;

class CitationTable extends Table
{
    protected $templatePath = __DIR__.'/../Templates/citations.json';

    public function query()
    {
        return Citation::selectRaw('
            citations.id as "dtRowId"
        ');
    }
}
