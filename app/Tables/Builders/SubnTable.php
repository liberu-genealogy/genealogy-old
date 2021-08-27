<?php

namespace App\Tables\Builders;

use App\Models\Subn;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class SubnTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/subns.json';

    public function query(): Builder
    {
        return Subn::selectRaw('
            subns.id, subns.subm, subns.famf, subns.temp, subns.ance, subns.desc, subns.ordi, subns.rin, subns.created_at
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
