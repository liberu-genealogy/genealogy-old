<?php

namespace App\Tables\Builders;

use App\Relationship;
use LaravelEnso\VueDatatable\app\Classes\Table;

class RelationshipTable extends Table
{
    protected $templatePath = __DIR__.'/../Templates/relationships.json';

    public function query()
    {
        return Relationship::select(\DB::raw('
            relationships.id as "dtRowId"
        '));
    }
}
