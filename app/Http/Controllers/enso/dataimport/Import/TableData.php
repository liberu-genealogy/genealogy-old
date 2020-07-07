<?php

namespace App\Http\Controllers\enso\dataimport\Import;

use Illuminate\Routing\Controller;
use App\Tables\Builders\enso\DataImport\DataImportTable;
use LaravelEnso\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = DataImportTable::class;
}
