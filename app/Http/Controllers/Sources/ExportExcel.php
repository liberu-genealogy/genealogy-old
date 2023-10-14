<?php

namespace App\Http\Controllers\Sources;

use App\Tables\Builders\SourceTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = SourceTable::class;
}
