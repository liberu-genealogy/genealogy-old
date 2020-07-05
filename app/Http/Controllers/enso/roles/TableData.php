<?php

namespace App\Http\Controllers\enso\Roles;

use App\Tables\Builders\enso\Roles\RoleTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected $tableClass = RoleTable::class;
}
