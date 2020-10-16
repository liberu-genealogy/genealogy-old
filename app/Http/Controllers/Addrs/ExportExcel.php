<?php

namespace App\Http\Controllers\Addrs;

use App\Tables\Builders\AddrTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = AddrTable::class;
}
