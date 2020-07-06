<?php

namespace App\Http\Controllers\enso\core\Administration\User;

use Illuminate\Routing\Controller;
use App\Tables\Builders\enso\core\UserTable;
use LaravelEnso\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected $tableClass = UserTable::class;
}
