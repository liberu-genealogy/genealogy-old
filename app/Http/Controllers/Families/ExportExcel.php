<?php

namespace App\Http\Controllers\Families;

use App\Tables\Builders\FamilyTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = FamilyTable::class;
}
