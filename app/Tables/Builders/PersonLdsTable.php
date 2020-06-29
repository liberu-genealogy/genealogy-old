<?php

namespace App\Tables\Builders;

use App\PersonLds;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\App\Contracts\Table;

class PersonLdsTable implements Table
{
    protected const TemplatePath = __DIR__.'/../../Templates/personLds.json';

    public function query(): Builder
    {
        return PersonLds::selectRaw('
            person_lds.id
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
