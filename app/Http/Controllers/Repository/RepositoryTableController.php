<?php

namespace App\Http\Controllers\Repository;

use App\Http\Controllers\Controller;
use App\Tables\Builders\RepositoryTable;
use LaravelEnso\VueDatatable\app\Traits\Datatable;
use LaravelEnso\VueDatatable\app\Traits\Excel;

class RepositoryTableController extends Controller
{
    use Datatable, Excel;

    protected $tableClass = RepositoryTable::class;
}
