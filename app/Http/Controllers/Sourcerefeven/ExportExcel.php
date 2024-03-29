<?php

namespace App\Http\Controllers\Sourcerefeven;

use App\Tables\Builders\SourceRefEvenTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = SourceRefEvenTable::class;
}
