<?php

namespace App\Tables\Builders;

use App\Models\Place;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class PlaceTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/places.json';

    public function query(): Builder
    {
        return Place::selectRaw('
            places.id, places.title, places.description, places.date
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
