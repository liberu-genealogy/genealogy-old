<?php

namespace App\Http\Controllers\enso\Menus;

use Illuminate\Routing\Controller;
use App\Tables\Builders\enso\Menus\MenuTable;
use LaravelEnso\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected $tableClass = MenuTable::class;
}
