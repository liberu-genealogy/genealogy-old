<?php

namespace App\Http\Controllers\Places;

use App\Tables\Builders\PlaceTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\App\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = PlaceTable::class;
}
