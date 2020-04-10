<?php

namespace App\Tables\Builders;

use App\Place;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\App\Contracts\Table;

class PlaceTable implements Table
{
    protected const TemplatePath = __DIR__.'/../../Templates/places.json';

    public function query(): Builder
    {
        return Place::selectRaw('
            places.id
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
