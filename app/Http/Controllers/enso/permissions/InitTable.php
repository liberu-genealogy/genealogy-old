<?php

namespace App\Http\Controllers\enso\permissions;

use Illuminate\Routing\Controller;
use App\Tables\Builders\enso\permissions\PermissionTable;
use LaravelEnso\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected $tableClass = PermissionTable::class;
}
