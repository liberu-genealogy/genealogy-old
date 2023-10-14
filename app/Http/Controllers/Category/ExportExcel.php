<?php

namespace App\Http\Controllers\Category;

use App\Tables\Builders\CategoryTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = CategoryTable::class;
}
