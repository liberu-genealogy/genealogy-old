<?php

namespace App\Http\Controllers\enso\permissions;

use Illuminate\Routing\Controller;
use App\Tables\Builders\enso\permissions\PermissionTable;
use LaravelEnso\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected $tableClass = PermissionTable::class;
}
