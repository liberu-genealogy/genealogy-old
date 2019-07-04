<?php

namespace App\Http\Controllers\Citation;

use Illuminate\Routing\Controller;
use App\Tables\Builders\CitationTable;
use LaravelEnso\Tables\app\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected $tableClass = CitationTable::class;
}
