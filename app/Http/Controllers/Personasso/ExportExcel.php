<?php

namespace App\Http\Controllers\Personasso;

use App\Tables\Builders\PersonAssoTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = PersonAssoTable::class;
}
