<?php

namespace App\Http\Controllers\Family;

use App\Http\Controllers\Controller;
use App\Tables\Builders\FamilyTable;
use LaravelEnso\VueDatatable\app\Traits\Datatable;
use LaravelEnso\VueDatatable\app\Traits\Excel;

class FamilyTableController extends Controller
{
    use Datatable, Excel;

    protected $tableClass = FamilyTable::class;
}
