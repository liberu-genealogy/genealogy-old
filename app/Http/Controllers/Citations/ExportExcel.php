<?php

namespace App\Http\Controllers\Citations;

use App\Tables\Builders\CitationTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = CitationTable::class;
}
