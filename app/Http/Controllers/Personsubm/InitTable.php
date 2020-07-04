<?php

namespace App\Http\Controllers\Personsubm;

use App\Tables\Builders\PersonSubmTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = PersonSubmTable::class;
}
