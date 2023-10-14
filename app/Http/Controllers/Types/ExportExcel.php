<?php

namespace App\Http\Controllers\Types;

use App\Tables\Builders\TypeTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = TypeTable::class;
}
