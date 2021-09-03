<?php

namespace App\Tables\Builders;

use App\Models\PersonAsso;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class PersonAssoTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/personAssos.json';

    public function query(): Builder
    {
        return PersonAsso::selectRaw('
            person_asso.id, "person_asso.group", person_asso.gid, person_asso.rela, person_asso.created_at
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
