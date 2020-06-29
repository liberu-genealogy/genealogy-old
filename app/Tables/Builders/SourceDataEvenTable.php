<?php

namespace App\Tables\Builders;

use App\SourceDataEven;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\App\Contracts\Table;

class SourceDataEvenTable implements Table
{
    protected const TemplatePath = __DIR__.'/../../Templates/sourceDataEvens.json';

    public function query(): Builder
    {
        return SourceDataEven::selectRaw('
            source_data_evens.id
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
