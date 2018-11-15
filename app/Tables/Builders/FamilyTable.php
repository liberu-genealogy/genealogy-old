<?php

namespace App\Tables\Builders;

use App\Family;
use LaravelEnso\VueDatatable\app\Classes\Table;

class FamilyTable extends Table
{
    protected $templatePath = __DIR__.'/../Templates/families.json';

    public function query()
    {
        return Family::leftJoin('individuals as father', function ($join) {
            $join->on('father.id', '=', 'families.father_id');
        })
            ->leftJoin('individuals as mother', function ($join) {
                $join->on('mother.id', '=', 'families.mother_id');
            })
            ->select(\DB::raw('
            families.id as "dtRowId", families.description as description, father.first_name as father_first_name, father.last_name as father_last_name, mother.first_name as mother_first_name, mother.last_name as mother_last_name, families.is_active
            '));
    }
}
