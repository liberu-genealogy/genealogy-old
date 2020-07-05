<?php

namespace App\Http\Controllers\enso\dataimport\Import;

use Illuminate\Routing\Controller;
use App\Tables\Builders\enso\DataImport\DataImportTable;
use LaravelEnso\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = DataImportTable::class;
}
