<?php

namespace App\Tables\Builders;

use App\note;
use LaravelEnso\Tables\app\Services\Table;

class noteTable extends Table
{
    protected $templatePath = __DIR__.'/../Templates/notes.json';

    public function query()
    {
        return note::selectRaw('
            notes.id as "dtRowId"
        ');
    }
}
