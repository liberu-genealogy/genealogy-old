<?php

namespace App\Http\Controllers\Notes;

use App\Tables\Builders\NoteTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\App\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = NoteTable::class;
}
