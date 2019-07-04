<?php

namespace App\Http\Controllers\Note;

use App\Tables\Builders\noteTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\app\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected $tableClass = noteTable::class;
}
