<?php

namespace App\Tables\Builders;

use App\Models\Family;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class FamilyTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/families.json';

    public function query(): Builder
    {
        return Family::leftJoin('people as husband', function ($join) {
            $join->on('husband.id', '=', 'families.husband_id');
        })
            ->leftJoin('people as wife', function ($join) {
                $join->on('wife.id', '=', 'families.wife_id');
            })
            ->select(\DB::raw('
            families.id, families.id as "dtRowId", families.description as description, husband.name as husband_name,
 wife.name as wife_name, families.is_active
            '));
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
