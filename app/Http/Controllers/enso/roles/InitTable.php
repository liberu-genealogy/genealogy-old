<?php

namespace App\Http\Controllers\enso\Roles;

use Illuminate\Routing\Controller;
use App\Tables\Builders\enso\Roles\RoleTable;
use LaravelEnso\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected $tableClass = RoleTable::class;
}
