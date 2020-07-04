<?php

namespace App\Http\Controllers\enso\Permissions;

use Illuminate\Routing\Controller;
use App\Tables\Builders\enso\Permissions\PermissionTable;
use LaravelEnso\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected $tableClass = PermissionTable::class;
}
