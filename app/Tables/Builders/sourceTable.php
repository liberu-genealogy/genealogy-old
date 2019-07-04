<?php

namespace App\Tables\Builders;

use App\source;
use LaravelEnso\Tables\app\Services\Table;

class sourceTable extends Table
{
    protected $templatePath = __DIR__.'/../Templates/sources.json';

    public function query()
    {
        return source::selectRaw('
            sources.id as "dtRowId"
        ');
    }
}
