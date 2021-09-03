<?php

namespace App\Http\Controllers\Users;

use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Data;
use App\Tables\Builders\UserTable;

class TableData extends Controller
{
    use Data;

    protected $tableClass = UserTable::class;
}
