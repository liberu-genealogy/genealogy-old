<?php

namespace App\Tables\Builders;

use App\Models\Repository;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class RepositoryTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/repositories.json';

    public function query(): Builder
    {
        return Repository::select(\DB::raw('
            id as "dtRowId", name, description, is_active, date, created_at
        '));
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
