<?php

namespace App\Http\Controllers\Subn;

use App\Tables\Builders\SubnTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = SubnTable::class;
}
