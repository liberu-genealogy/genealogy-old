<?php

namespace App\Tables\Builders;

use App\Models\FamilySlgs;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class FamilySlgsTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/familySlgs.json';

    public function query(): Builder
    {
        return FamilySlgs::selectRaw('
            family_slgs.id, family_slgs.family_id, family_slgs.stat, family_slgs.date, family_slgs.plac, family_slgs.temp, family_slgs.created_at
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
