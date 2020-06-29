<?php

namespace App\Tables\Builders;

use App\Chan;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\App\Contracts\Table;

class ChanTable implements Table
{
    protected const TemplatePath = __DIR__.'/../../Templates/chans.json';

    public function query(): Builder
    {
        return Chan::selectRaw('
            chans.id
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
