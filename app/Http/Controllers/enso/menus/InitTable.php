<?php

namespace App\Http\Controllers\enso\Menus;

use App\Tables\Builders\enso\Menus\MenuTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected $tableClass = MenuTable::class;
}
