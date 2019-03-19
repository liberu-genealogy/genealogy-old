<?php

namespace App\Http\Controllers\Note;

use App\Tables\Builders\NoteTable;
use App\Http\Controllers\Controller;
use LaravelEnso\VueDatatable\app\Traits\Excel;
use LaravelEnso\VueDatatable\app\Traits\Datatable;

class NoteTableController extends Controller
{
    use Datatable, Excel;

    protected $tableClass = NoteTable::class;
}
