<?php

namespace App\Http\Controllers\Repository;

use Illuminate\Routing\Controller;
use App\Tables\Builders\repositoryTable;
use LaravelEnso\Tables\app\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected $tableClass = repositoryTable::class;
}
