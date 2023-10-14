<?php

namespace App\Http\Controllers\Authors;

use App\Tables\Builders\AuthorTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = AuthorTable::class;
}
