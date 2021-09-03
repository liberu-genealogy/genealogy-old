<?php

namespace App\Tables\Builders;

use App\Models\PersonAnci;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class PersonAnciTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/personAncis.json';

    public function query(): Builder
    {
        return PersonAnci::selectRaw('
            person_anci.id, "person_anci.group", person_anci.gid, person_anci.anci, person_anci.created_at
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
