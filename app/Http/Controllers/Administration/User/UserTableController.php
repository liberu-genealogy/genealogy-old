<?php

namespace App\Http\Controllers\Administration\User;

use App\Http\Controllers\Controller;
use App\Tables\Builders\UserTable;
use LaravelEnso\VueDatatable\app\Traits\Datatable;
use LaravelEnso\VueDatatable\app\Traits\Excel;

class UserTableController extends Controller
{
    use Datatable, Excel;

    protected $tableClass = UserTable::class;
}
