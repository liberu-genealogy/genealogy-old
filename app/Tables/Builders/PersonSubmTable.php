<?php

namespace App\Tables\Builders;

use App\PersonSubm;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\App\Contracts\Table;

class PersonSubmTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/personSubms.json';

    public function query(): Builder
    {
        return PersonSubm::selectRaw('
            person_subm.id, person_subm.group, person_subm.gid, person_subm.subm, person_subm.created_at
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
