<?php

namespace App\Http\Controllers\Subn;

use App\Tables\Builders\SubnTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = SubnTable::class;
}
