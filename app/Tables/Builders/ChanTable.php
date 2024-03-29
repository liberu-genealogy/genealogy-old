<?php

namespace App\Tables\Builders;

use App\Models\Chan;
use Illuminate\Database\Eloquent\Builder;
use LaravelLiberu\Tables\Contracts\Table;

class ChanTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/chans.json';

    public function query(): Builder
    {
        return Chan::select(\DB::raw('
            chans.id, chans.`group`, chans.gid, chans.date, chans.time, chans.created_at
        '));
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
