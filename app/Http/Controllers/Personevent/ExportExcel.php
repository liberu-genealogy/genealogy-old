<?php

namespace App\Http\Controllers\Personevent;

use App\Tables\Builders\PersonEventTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = PersonEventTable::class;
}
