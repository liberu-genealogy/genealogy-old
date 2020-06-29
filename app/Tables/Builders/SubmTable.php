<?php

namespace App\Tables\Builders;

use App\Subm;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\App\Contracts\Table;

class SubmTable implements Table
{
    protected const TemplatePath = __DIR__.'/../../Templates/subms.json';

    public function query(): Builder
    {
        return Subm::selectRaw('
            subms.id
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
