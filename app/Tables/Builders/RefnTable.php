<?php

namespace App\Tables\Builders;

use App\Refn;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\App\Contracts\Table;

class RefnTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/refns.json';

    public function query(): Builder
    {
        return Refn::selectRaw('
            refns.id, refns.group, refns.gid, refns.refn, refns.type, refns.created_at
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
