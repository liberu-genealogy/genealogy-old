<?php

namespace App\Http\Controllers\Repositories;

use App\Tables\Builders\RepositoryTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = RepositoryTable::class;
}
