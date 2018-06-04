<?php

namespace App\Tables\Builders;

use App\Family;
use LaravelEnso\VueDatatable\app\Classes\Table;

class FamilyTable extends Table
{
    protected $templatePath = __DIR__.'/../Templates/families.json';

    public function query()
    {
        return Owner::select(\DB::raw('
            id as "dtRowId", description, individual_1, individual_2
        '));
    }
}
