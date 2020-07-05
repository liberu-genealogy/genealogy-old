<?php

namespace App\Http\Controllers\enso\core\Administration\UserGroup;

use App\Tables\Builders\enso\core\UserGroupTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected $tableClass = UserGroupTable::class;
}
