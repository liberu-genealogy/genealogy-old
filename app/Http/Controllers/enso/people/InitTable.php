<?php

namespace App\Http\Controllers\enso\people;

use Illuminate\Routing\Controller;
use App\Tables\Builders\PersonTable;
use LaravelEnso\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected $tableClass = PersonTable::class;
}
