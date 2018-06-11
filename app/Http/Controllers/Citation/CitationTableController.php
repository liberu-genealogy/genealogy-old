<?php

namespace App\Http\Controllers\Citation;

use App\Http\Controllers\Controller;
use App\Tables\Builders\CitationTable;
use LaravelEnso\VueDatatable\app\Traits\Datatable;
use LaravelEnso\VueDatatable\app\Traits\Excel;

class CitationTableController extends Controller
{
    use Datatable, Excel;

    protected $tableClass = CitationTable::class;
}
