<?php

namespace App\Http\Controllers\Person;

use App\Tables\Builders\PersonTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected $tableClass = PersonTable::class;
}
