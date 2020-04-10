<?php

namespace App\Tables\Builders;

use App\Note;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\App\Contracts\Table;

class NoteTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/notes.json';

    public function query(): Builder
    {
        return Note::selectRaw('
            notes.id
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
