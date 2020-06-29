<?php

namespace App\Tables\Builders;

use App\Subn;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\App\Contracts\Table;

class SubnTable implements Table
{
    protected const TemplatePath = __DIR__.'/../../Templates/subns.json';

    public function query(): Builder
    {
        return Subn::selectRaw('
            subns.id
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
