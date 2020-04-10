<?php

namespace App\Tables\Builders;

use App\Citation;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\App\Contracts\Table;

class CitationTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/citations.json';

    public function query(): Builder
    {
        return Citation::selectRaw('
            citations.id
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
