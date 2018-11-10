<?php

namespace App\Tables\Builders;

use App\Note;
use LaravelEnso\VueDatatable\app\Classes\Table;

class NoteTable extends Table
{
    protected $templatePath = __DIR__.'/../Templates/notes.json';

    public function query()
    {
        return Note::select(\DB::raw('
            notes.id as "dtRowId"
        '));
    }
}
