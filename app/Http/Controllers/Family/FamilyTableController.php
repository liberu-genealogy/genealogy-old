<?php

namespace App\Http\Controllers\Family;

use App\Tables\Builders\FamilyTable;
use App\Http\Controllers\Controller;
use LaravelEnso\VueDatatable\app\Traits\Excel;
use LaravelEnso\VueDatatable\app\Traits\Datatable;

class FamilyTableController extends Controller
{
    use Datatable, Excel;

    protected $tableClass = FamilyTable::class;
}
