<?php

namespace App\Http\Controllers\enso\core\Administration\UserGroup;

use Illuminate\Routing\Controller;
use LaravelEnso\Core\Tables\Builders\UserGroupTable;
use LaravelEnso\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected $tableClass = UserGroupTable::class;
}
