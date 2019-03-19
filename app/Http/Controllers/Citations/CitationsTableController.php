<?php

namespace App\Http\Controllers\Citations;

use App\Tables\Builders\CitationsTable;
use App\Http\Controllers\Controller;
use LaravelEnso\VueDatatable\app\Traits\Excel;
use LaravelEnso\VueDatatable\app\Traits\Datatable;

class CitationsTableController extends Controller
{
    use Datatable, Excel;

    protected $tableClass = CitationsTable::class;
}
