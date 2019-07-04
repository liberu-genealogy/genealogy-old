<?php

namespace App\Tables\Builders;

use App\note;
use LaravelEnso\Tables\app\Services\Table;

class NoteTable extends Table
{
    protected $templatePath = __DIR__.'/../Templates/notes.json';

    public function query()
    {
        return Note::selectRaw('
            notes.id as "dtRowId", name, description, is_active, date, created_at
        ');
    }
}
