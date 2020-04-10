<?php

namespace App\Http\Controllers\Notes;

use App\Tables\Builders\NoteTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\App\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = NoteTable::class;
}
