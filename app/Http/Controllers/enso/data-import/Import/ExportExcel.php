<?php

namespace App\Http\Controllers\enso\dataimport\Import;

use Illuminate\Routing\Controller;
use App\Tables\Builders\enso\DataImport\DataImportTable;
use LaravelEnso\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = DataImportTable::class;
}
