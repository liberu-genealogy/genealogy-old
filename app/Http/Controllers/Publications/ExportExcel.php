<?php

namespace App\Http\Controllers\Publications;

use App\Tables\Builders\PublicationTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = PublicationTable::class;
}
