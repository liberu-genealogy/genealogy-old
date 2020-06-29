<?php

namespace App\Tables\Builders;

use App\PersonEvent;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\App\Contracts\Table;

class PersonEventTable implements Table
{
    protected const TemplatePath = __DIR__.'/../../Templates/personEvents.json';

    public function query(): Builder
    {
        return PersonEvent::selectRaw('
            person_events.id
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
