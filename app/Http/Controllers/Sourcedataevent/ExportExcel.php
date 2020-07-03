<?php

namespace App\Http\Controllers\Sourcedataevent;

use App\Tables\Builders\SourceDataEvenTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\App\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = SourceDataEvenTable::class;
}
