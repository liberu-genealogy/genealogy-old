<?php

namespace App\Tables\Builders;

use App\Models\Publication;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class PublicationTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/publications.json';

    public function query(): Builder
    {
        return Publication::selectRaw('
            publications.id, publications.name, publications.description, publications.is_active
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
