<?php

namespace App\Http\Controllers\Chan;

use App\Tables\Builders\ChanTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = ChanTable::class;
}
