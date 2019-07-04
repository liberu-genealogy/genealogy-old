<?php

namespace App\Http\Controllers\Note;

use App\Tables\Builders\noteTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\app\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected $tableClass = noteTable::class;
}
