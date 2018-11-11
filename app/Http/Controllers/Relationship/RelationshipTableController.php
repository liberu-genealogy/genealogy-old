<?php

namespace App\Http\Controllers\Relationship;

use App\Http\Controllers\Controller;
use App\Tables\Builders\RelationshipTable;
use LaravelEnso\VueDatatable\app\Traits\Excel;
use LaravelEnso\VueDatatable\app\Traits\Datatable;

class RelationshipTableController extends Controller
{
    use Datatable, Excel;

    protected $tableClass = RelationshipTable::class;
}
