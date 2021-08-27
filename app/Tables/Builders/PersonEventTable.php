<?php

namespace App\Tables\Builders;

use App\Models\PersonEvent;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class PersonEventTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/personEvents.json';

    public function query(): Builder
    {
        return PersonEvent::selectRaw('
            person_events.id, person_events.title, person_events.description, person_events.date, person_events.created_at
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
