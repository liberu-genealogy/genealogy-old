<?php

namespace App\Http\Controllers\Refn;

use App\Tables\Builders\RefnTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = RefnTable::class;
}
