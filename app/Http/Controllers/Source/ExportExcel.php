<?php

namespace App\Http\Controllers\Source;

use Illuminate\Routing\Controller;
use App\Tables\Builders\sourceTable;
use LaravelEnso\Tables\app\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected $tableClass = sourceTable::class;
}
