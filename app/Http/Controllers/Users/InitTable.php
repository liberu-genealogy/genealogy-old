<?php

namespace App\Http\Controllers\Users;

use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Init;
use App\Tables\Builders\UserTable;

class InitTable extends Controller
{
    use Init;

    protected $tableClass = UserTable::class;
}
