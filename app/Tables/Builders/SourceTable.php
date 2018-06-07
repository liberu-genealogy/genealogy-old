<?php

namespace App\Tables\Builders;

use App\Source;
use LaravelEnso\VueDatatable\app\Classes\Table;

class SourceTable extends Table
{
    protected $templatePath = __DIR__.'/../Templates/sources.json';

    public function query()
    {
        return Source::select(\DB::raw('
            id as "dtRowId", name, description, is_active, date, created_at
        '));
    }
}
