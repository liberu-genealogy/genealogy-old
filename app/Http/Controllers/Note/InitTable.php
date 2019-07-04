<?php

namespace App\Http\Controllers\Note;

use App\Tables\Builders\noteTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\app\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected $tableClass = noteTable::class;
}
