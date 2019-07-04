<?php

namespace App\Http\Controllers\Source;

use App\Tables\Builders\sourceTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\app\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected $tableClass = sourceTable::class;
}
