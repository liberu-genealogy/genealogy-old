<?php

namespace App\Tables\Builders;

use App\Models\SourceDataEven;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class SourceDataEvenTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/sourceDataEvens.json';

    public function query(): Builder
    {
        return SourceDataEven::selectRaw('
            source_data_even.id, source_data_even.date, source_data_even.plac, source_data_even.created_at
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
