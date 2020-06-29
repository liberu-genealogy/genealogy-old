<?php

namespace App\Tables\Builders;

use App\PersonAsso;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\App\Contracts\Table;

class PersonAssoTable implements Table
{
    protected const TemplatePath = __DIR__.'/../../Templates/personAssos.json';

    public function query(): Builder
    {
        return PersonAsso::selectRaw('
            person_assos.id
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
