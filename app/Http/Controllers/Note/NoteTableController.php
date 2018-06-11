<?php

namespace App\Http\Controllers\Note;

use App\Http\Controllers\Controller;
use App\Tables\Builders\NoteTable;
use LaravelEnso\VueDatatable\app\Traits\Datatable;
use LaravelEnso\VueDatatable\app\Traits\Excel;

class NoteTableController extends Controller
{
    use Datatable, Excel;

    protected $tableClass = NoteTable::class;
}
