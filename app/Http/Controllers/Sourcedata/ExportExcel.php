<?php

namespace App\Http\Controllers\Sourcedata;

use App\Tables\Builders\SourceDataTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\App\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = SourceDataTable::class;
}
