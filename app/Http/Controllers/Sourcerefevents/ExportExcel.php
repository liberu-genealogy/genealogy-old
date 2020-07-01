<?php

namespace App\Http\Controllers\Sourcerefevents;

use App\Tables\Builders\SourceRefEvenTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = SourceRefEvenTable::class;
}
