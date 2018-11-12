<?php

namespace App\Http\Controllers\Sources;

use App\Http\Controllers\Controller;
use App\Tables\Builders\SourceTable;
use LaravelEnso\VueDatatable\app\Traits\Excel;
use LaravelEnso\VueDatatable\app\Traits\Datatable;

class SourceTableController extends Controller
{
    use Datatable, Excel;

    protected $tableClass = SourceTable::class;
}
