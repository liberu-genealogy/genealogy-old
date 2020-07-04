<?php

namespace App\Http\Controllers\enso\permissions;

use Illuminate\Routing\Controller;
use App\Tables\Builders\enso\permissions\PermissionTable;
use LaravelEnso\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected $tableClass = PermissionTable::class;
}
