<?php

namespace App\Tables\Builders;

use App\Models\Chan;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class ChanTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/chans.json';

    public function query(): Builder
    {
        return Chan::selectRaw('
            chans.id, "chans.group", chans.gid, chans.date, chans.time, chans.created_at
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
