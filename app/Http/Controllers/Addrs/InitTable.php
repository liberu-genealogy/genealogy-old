<?php

namespace App\Http\Controllers\Addrs;

use App\Tables\Builders\AddrTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = AddrTable::class;
}
