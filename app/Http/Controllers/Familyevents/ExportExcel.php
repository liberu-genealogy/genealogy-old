<?php

namespace App\Http\Controllers\Familyevents;

use App\Tables\Builders\FamilyEventTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = FamilyEventTable::class;
}
