<?php

namespace App\Tables\Builders;

use App\PersonAnci;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\App\Contracts\Table;

class PersonAnciTable implements Table
{
    protected const TemplatePath = __DIR__.'/../../Templates/personAncis.json';

    public function query(): Builder
    {
        return PersonAnci::selectRaw('
            person_ancis.id
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
