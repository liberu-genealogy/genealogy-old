<?php

namespace App\Tables\Builders;

use App\Models\Source;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class SourceTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/sources.json';

    public function query(): Builder
    {
        return Source::select(\DB::raw('
            id as "dtRowId", name, description, is_active, date, created_at
        '));
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
