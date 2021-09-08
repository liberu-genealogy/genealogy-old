<?php

namespace App\Http\Controllers\Users;

use App\Tables\Builders\UserTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected $tableClass = UserTable::class;
}
