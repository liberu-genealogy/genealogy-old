<?php

namespace App\Tables\Builders;

use App\Models\Note;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class NoteTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/notes.json';

    public function query(): Builder
    {
        return Note::select(\DB::raw('
            id as "dtRowId", name, description, is_active, date, created_at
        '));
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
