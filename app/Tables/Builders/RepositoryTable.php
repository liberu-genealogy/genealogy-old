<?php

namespace App\Tables\Builders;

use App\Repository;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\App\Contracts\Table;

class RepositoryTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/repositories.json';

    public function query(): Builder
    {
        return Repository::selectRaw('
            repositories.id
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
