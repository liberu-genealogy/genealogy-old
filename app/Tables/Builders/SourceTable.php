<?php

namespace App\Tables\Builders;

use App\source;
use LaravelEnso\Tables\app\Services\Table;

class SourceTable extends Table
{
    protected $templatePath = __DIR__.'/../Templates/sources.json';

    public function query()
    {
        return Source::selectRaw('
            sources.id as "dtRowId", name, description, is_active, date, created_at
        ');
    }
}
