<?php

namespace App\Tables\Builders;

use App\Models\Refn;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class RefnTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/refns.json';

    public function query(): Builder
    {
        return Refn::selectRaw('
            refn.id, "refn.group", refn.gid, refn.refn, refn.type, refn.created_at
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
