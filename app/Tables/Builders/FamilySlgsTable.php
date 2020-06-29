<?php

namespace App\Tables\Builders;

use App\FamilySlgs;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\App\Contracts\Table;

class FamilySlgsTable implements Table
{
    protected const TemplatePath = __DIR__.'/../../Templates/familySlgs.json';

    public function query(): Builder
    {
        return FamilySlgs::selectRaw('
            family_slgs.id
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
