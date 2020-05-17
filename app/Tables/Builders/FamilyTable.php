<?php

namespace App\Tables\Builders;

use App\Family;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\App\Contracts\Table;

class FamilyTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/families.json';

    public function query(): Builder
    {
        return Family::leftJoin('persons as father', function ($join) {
            $join->on('father.id', '=', 'families.father_id');
        })
            ->leftJoin('persons as mother', function ($join) {
                $join->on('mother.id', '=', 'families.mother_id');
            })
            ->select(\DB::raw('
            families.id as "dtRowId", families.description as description, father.first_name as father_first_name, father.last_name as father_last_name,
 mother.first_name as mother_first_name, mother.last_name as mother_last_name, families.is_active
            '));
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
