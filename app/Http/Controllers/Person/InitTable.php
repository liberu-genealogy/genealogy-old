<?php

namespace App\Http\Controllers\Person;

use App\Tables\Builders\PersonTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected $tableClass = PersonTable::class;
}
