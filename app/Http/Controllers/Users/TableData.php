<?php

namespace App\Http\Controllers\Users;

use App\Tables\Builders\UserTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected $tableClass = UserTable::class;
}
