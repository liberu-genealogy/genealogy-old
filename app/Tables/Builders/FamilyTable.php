<?php

namespace App\Tables\Builders;

use App\Family;
use LaravelEnso\VueDatatable\app\Classes\Table;

class FamilyTable extends Table
{
    protected $templatePath = __DIR__.'/../Templates/families.json';

    public function query()
    {
        return Family::select(\DB::raw(
            'families.id as "dtRowId", families.description as description, fathers.first_name as father_first_name, fathers.last_name as father_last_name, mothers.first_name as mother_first_name, mothers.last_name as mother_last_name, families.is_active'
        ))->join('individuals as fathers', 'fathers.id', '=', 'families.father_id')
            ->join('individuals as mothers', 'mothers.id', '=', 'families.mother_id');
    }
}
