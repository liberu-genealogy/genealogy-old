<?php

namespace App\Http\Controllers\enso\Permissions;

use Illuminate\Routing\Controller;
use App\Tables\Builders\enso\Permissions\PermissionTable;
use LaravelEnso\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected $tableClass = PermissionTable::class;
}
