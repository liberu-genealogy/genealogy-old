<?php

namespace App\Http\Controllers\Dna;

use App\Tables\Builders\DnaTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = DnaTable::class;
}
