<?php

namespace App\Http\Controllers\Notes;

use App\Tables\Builders\NoteTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = NoteTable::class;
}
