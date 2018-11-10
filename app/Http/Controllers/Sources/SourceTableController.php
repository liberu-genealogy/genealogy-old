<?php

namespace App\Http\Controllers\Sources;

use App\Tables\Builders\SourceTable;
use App\Http\Controllers\Controller;
use LaravelEnso\VueDatatable\app\Traits\Excel;
use LaravelEnso\VueDatatable\app\Traits\Datatable;

class SourceTableController extends Controller
{
    use Datatable, Excel;

    protected $tableClass = SourceTable::class;
}
