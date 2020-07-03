<?php

namespace App\Http\Controllers\Chan;

use App\Tables\Builders\ChanTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = ChanTable::class;
}
