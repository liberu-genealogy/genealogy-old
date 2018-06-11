<?php

namespace App\Http\Controllers\Administration\Owner;

use App\Http\Controllers\Controller;
use App\Tables\Builders\OwnerTable;
use LaravelEnso\VueDatatable\app\Traits\Datatable;
use LaravelEnso\VueDatatable\app\Traits\Excel;

class OwnerTableController extends Controller
{
    use Datatable, Excel;

    protected $tableClass = OwnerTable::class;
}
