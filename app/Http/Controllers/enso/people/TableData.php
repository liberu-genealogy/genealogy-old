<?php

namespace App\Http\Controllers\enso\people;

use App\Tables\Builders\PersonTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected $tableClass = PersonTable::class;
}
