<?php

namespace App\Http\Controllers\Subm;

use App\Tables\Builders\SubmTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = SubmTable::class;
}
