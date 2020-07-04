<?php

namespace App\Http\Controllers\enso\Menus;

use Illuminate\Routing\Controller;
use App\Tables\Builders\enso\Menus\MenuTable;
use LaravelEnso\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected $tableClass = MenuTable::class;
}
