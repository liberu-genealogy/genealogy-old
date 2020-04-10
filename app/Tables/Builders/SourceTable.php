<?php

namespace App\Tables\Builders;

use App\Source;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\App\Contracts\Table;

class SourceTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/sources.json';

    public function query(): Builder
    {
        return Source::selectRaw('
            sources.id
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
