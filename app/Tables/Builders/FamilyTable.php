<?php

namespace App\Tables\Builders;

use App\Family;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\App\Contracts\Table;

class FamilyTable implements Table
{
    protected const TemplatePath = __DIR__.'/../../Templates/families.json';

    public function query(): Builder
    {
        return Family::selectRaw('
            families.id
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
