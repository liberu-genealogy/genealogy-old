<?php

namespace App\Http\Controllers\Sourcedataeven;

use App\Tables\Builders\SourceDataEvenTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = SourceDataEvenTable::class;
}
