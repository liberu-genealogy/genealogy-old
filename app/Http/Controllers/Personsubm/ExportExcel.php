<?php

namespace App\Http\Controllers\Personsubm;

use App\Tables\Builders\PersonSubmTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = PersonSubmTable::class;
}
