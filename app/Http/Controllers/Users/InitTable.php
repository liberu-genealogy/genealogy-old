<?php

namespace App\Http\Controllers\Users;

use App\Tables\Builders\UserTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected $tableClass = UserTable::class;
}
