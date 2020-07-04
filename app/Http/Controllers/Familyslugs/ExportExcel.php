<?php

namespace App\Http\Controllers\Familyslugs;

use App\Tables\Builders\FamilySlgsTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = FamilySlgsTable::class;
}
