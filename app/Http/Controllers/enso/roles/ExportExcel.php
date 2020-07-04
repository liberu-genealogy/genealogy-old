<?php

namespace App\Http\Controllers\enso\Roles;

use App\Tables\Builders\enso\Roles\RoleTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected $tableClass = RoleTable::class;
}
