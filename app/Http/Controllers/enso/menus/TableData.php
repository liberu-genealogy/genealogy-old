<?php

namespace App\Http\Controllers\enso\Menus;

use App\Tables\Builders\enso\Menus\MenuTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected $tableClass = MenuTable::class;
}
