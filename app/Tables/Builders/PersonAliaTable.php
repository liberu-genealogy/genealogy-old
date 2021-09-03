<?php

namespace App\Tables\Builders;

use App\Models\PersonAlia;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class PersonAliaTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/personAlias.json';

    public function query(): Builder
    {
        return PersonAlia::selectRaw('
            person_alia.id, "person_alia.group", person_alia.gid, person_alia.alia, person_alia.created_at
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
