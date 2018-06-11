<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use App\Tables\Builders\IndividualTable;
use LaravelEnso\VueDatatable\app\Traits\Datatable;
use LaravelEnso\VueDatatable\app\Traits\Excel;

class IndividualTableController extends Controller
{
    use Datatable, Excel;

    protected $tableClass = IndividualTable::class;
}
