<?php

namespace App\Http\Controllers\Citation;

use App\Tables\Builders\CitationTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\app\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected $tableClass = CitationTable::class;
}
