<?php

namespace App\Http\Controllers\Notes;

use App\Tables\Builders\NoteTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = NoteTable::class;
}
