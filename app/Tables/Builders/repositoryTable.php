<?php

namespace App\Tables\Builders;

use App\repository;
use LaravelEnso\Tables\app\Services\Table;

class repositoryTable extends Table
{
    protected $templatePath = __DIR__.'/../Templates/repositories.json';

    public function query()
    {
        return repository::selectRaw('
            repositories.id as "dtRowId"
        ');
    }
}
