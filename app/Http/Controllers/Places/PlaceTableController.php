<?php

namespace App\Http\Controllers\Places;

use App\Tables\Builders\PlaceTable;
use App\Http\Controllers\Controller;
use LaravelEnso\VueDatatable\app\Traits\Excel;
use LaravelEnso\VueDatatable\app\Traits\Datatable;

class PlaceTableController extends Controller
{
    use Datatable, Excel;

    protected $tableClass = PlaceTable::class;
}
