<?php

namespace App\Http\Controllers\Places;

use App\Tables\Builders\PlaceTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\App\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = PlaceTable::class;
}
