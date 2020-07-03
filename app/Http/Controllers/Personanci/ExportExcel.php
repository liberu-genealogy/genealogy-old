<?php

namespace App\Http\Controllers\Personanci;

use App\Tables\Builders\PersonAnciTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = PersonAnciTable::class;
}
