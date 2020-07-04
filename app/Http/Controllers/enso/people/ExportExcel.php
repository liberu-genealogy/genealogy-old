<?php

namespace App\Http\Controllers\enso\people;

use Illuminate\Routing\Controller;
use LaravelEnso\People\Tables\Builders\PersonTable;
use LaravelEnso\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected $tableClass = PersonTable::class;
}
