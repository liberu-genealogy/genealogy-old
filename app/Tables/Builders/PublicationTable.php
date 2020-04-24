<?php

namespace App\Tables\Builders;

use App\Publication;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\App\Contracts\Table;

class PublicationTable implements Table
{
    protected const TemplatePath = __DIR__.'/../../Templates/publications.json';

    public function query(): Builder
    {
        return Publication::selectRaw('
            publications.id
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
