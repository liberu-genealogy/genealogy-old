<?php

namespace App\Http\Controllers\Personalias;

use App\Tables\Builders\PersonAliaTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = PersonAliaTable::class;
}
