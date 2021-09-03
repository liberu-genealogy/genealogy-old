<?php

namespace App\Http\Controllers\Users;

use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Excel;
use App\Tables\Builders\UserTable;

class ExportExcel extends Controller
{
    use Excel;

    protected $tableClass = UserTable::class;
}
