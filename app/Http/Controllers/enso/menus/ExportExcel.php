<?php

namespace App\Http\Controllers\enso\Menus;

use Illuminate\Routing\Controller;
use LaravelEnso\Menus\Tables\Builders\MenuTable;
use LaravelEnso\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected $tableClass = MenuTable::class;
}
