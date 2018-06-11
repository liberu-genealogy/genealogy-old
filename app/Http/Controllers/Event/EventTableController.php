<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Tables\Builders\EventTable;
use LaravelEnso\VueDatatable\app\Traits\Datatable;
use LaravelEnso\VueDatatable\app\Traits\Excel;

class EventTableController extends Controller
{
    use Datatable, Excel;

    protected $tableClass = EventTable::class;
}
