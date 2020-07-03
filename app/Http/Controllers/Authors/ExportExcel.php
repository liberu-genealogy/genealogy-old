<?php

namespace App\Http\Controllers\Authors;

use App\Tables\Builders\AuthorTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\App\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = AuthorTable::class;
}
