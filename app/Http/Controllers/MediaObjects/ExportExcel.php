<?php

namespace App\Http\Controllers\MediaObjects;

use App\Tables\Builders\MediaObjectTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = MediaObjectTable::class;
}
