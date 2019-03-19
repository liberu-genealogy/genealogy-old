<?php

namespace App\Http\Controllers\Repository;

use App\Tables\Builders\RepositoryTable;
use App\Http\Controllers\Controller;
use LaravelEnso\VueDatatable\app\Traits\Excel;
use LaravelEnso\VueDatatable\app\Traits\Datatable;

class RepositoryTableController extends Controller
{
    use Datatable, Excel;

    protected $tableClass = RepositoryTable::class;
}
