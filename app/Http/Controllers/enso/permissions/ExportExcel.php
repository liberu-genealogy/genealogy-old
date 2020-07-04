<?php

namespace App\Http\Controllers\enso\Permissions;

use Illuminate\Routing\Controller;
use App\Tables\Builders\enso\Permissions\PermissionTable;
use LaravelEnso\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected $tableClass = PermissionTable::class;
}
