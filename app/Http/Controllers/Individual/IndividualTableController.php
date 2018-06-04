<?php

namespace App\Http\Controllers\Administration\Individual;

use App\Tables\Builders\IndividualTable;
use App\Http\Controllers\Controller;
use LaravelEnso\VueDatatable\app\Traits\Excel;
use LaravelEnso\VueDatatable\app\Traits\Datatable;

class IndividualTableController extends Controller
{
    use Datatable, Excel;

    protected $tableClass = IndividualTable::class;
}
