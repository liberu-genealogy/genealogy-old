<?php

namespace App\Http\Controllers\Relationship;

use App\Tables\Builders\RelationshipTable;
use App\Http\Controllers\Controller;
use LaravelEnso\VueDatatable\app\Traits\Excel;
use LaravelEnso\VueDatatable\app\Traits\Datatable;

class RelationshipTableController extends Controller
{
    use Datatable, Excel;

    protected $tableClass = RelationshipTable::class;
}
