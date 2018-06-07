<?php

namespace App\Tables\Builders;

use App\Repository;
use LaravelEnso\VueDatatable\app\Classes\Table;

class RepositoryTable extends Table
{
    protected $templatePath = __DIR__.'/../Templates/repositories.json';

    public function query()
    {
        return Repository::select(\DB::raw('
            id as "dtRowId", name, description, is_active, date, created_at
        '));
    }
}
