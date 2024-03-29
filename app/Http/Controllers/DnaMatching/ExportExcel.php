<?php

namespace App\Http\Controllers\DnaMatching;

use App\Tables\Builders\DnaMatchingTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = DnaMatchingTable::class;
}
