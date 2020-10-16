<?php

namespace App\Http\Controllers\Addrs;

use App\Tables\Builders\AddrTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = AddrTable::class;
}
