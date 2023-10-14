<?php

namespace App\Http\Controllers\Places;

use App\Tables\Builders\PlaceTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = PlaceTable::class;
}
