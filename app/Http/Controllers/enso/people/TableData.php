<?php

namespace App\Http\Controllers\enso\people;

use Illuminate\Routing\Controller;
use App\Tables\Builders\PersonTable;
use LaravelEnso\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected $tableClass = PersonTable::class;
}
