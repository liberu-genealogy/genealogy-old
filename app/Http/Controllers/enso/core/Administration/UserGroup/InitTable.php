<?php

namespace App\Http\Controllers\enso\core\Administration\UserGroup;

use App\Tables\Builders\enso\core\UserGroupTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected $tableClass = UserGroupTable::class;
}
