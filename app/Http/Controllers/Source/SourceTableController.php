<?php

namespace App\Http\Controllers\Source;

use App\Http\Controllers\Controller;
use App\Tables\Builders\SourceTable;
use LaravelEnso\VueDatatable\app\Traits\Datatable;
use LaravelEnso\VueDatatable\app\Traits\Excel;

class SourceTableController extends Controller
{
    use Datatable, Excel;

    protected $tableClass = SourceTable::class;
}
