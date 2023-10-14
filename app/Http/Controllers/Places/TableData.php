<?php

namespace App\Http\Controllers\Places;

use App\Tables\Builders\PlaceTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = PlaceTable::class;
}
