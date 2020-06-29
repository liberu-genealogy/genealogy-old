<?php

namespace App\Tables\Builders;

use App\Addr;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\App\Contracts\Table;

class AddrTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/addrs.json';

    public function query(): Builder
    {
        return Addr::selectRaw('
            addrs.id, addrs.addr1, addrs.addr2, addrs.city, addrs.stae, addrs.post, addrs.ctry, addrs.created_at
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
