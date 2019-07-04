<?php

namespace App\Http\Controllers\Repository;

use App\Tables\Builders\repositoryTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\app\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected $tableClass = repositoryTable::class;
}
