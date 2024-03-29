<?php

namespace App\Http\Controllers\Personlds;

use App\Tables\Builders\PersonLdsTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = PersonLdsTable::class;
}
