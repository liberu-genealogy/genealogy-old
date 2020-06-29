<?php

namespace App\Tables\Builders;

use App\PersonAlia;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\App\Contracts\Table;

class PersonAliaTable implements Table
{
    protected const TemplatePath = __DIR__.'/../../Templates/personAlias.json';

    public function query(): Builder
    {
        return PersonAlia::selectRaw('
            person_alias.id
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
