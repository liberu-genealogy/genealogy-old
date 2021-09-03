<?php

namespace App\Tables\Builders;

use App\Models\PersonLds;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class PersonLdsTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/personLds.json';

    public function query(): Builder
    {
        return PersonLds::selectRaw('
            person_lds.id, "person_lds.group", person_lds.gid, person_lds.type, person_lds.stat, person_lds.date, person_lds.plac, person_lds.temp, person_lds.slac_famc, person_lds.created_at
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
