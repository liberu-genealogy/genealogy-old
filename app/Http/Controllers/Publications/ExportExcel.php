<?php

namespace App\Http\Controllers\Publications;

use App\Tables\Builders\PublicationTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\App\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = PublicationTable::class;
}
