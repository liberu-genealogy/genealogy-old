<?php

namespace App\Http\Controllers\Events;

use App\Tables\Builders\EventTable;
use App\Http\Controllers\Controller;
use LaravelEnso\VueDatatable\app\Traits\Excel;
use LaravelEnso\VueDatatable\app\Traits\Datatable;

class EventTableController extends Controller
{
    use Datatable, Excel;

    protected $tableClass = EventTable::class;
}
