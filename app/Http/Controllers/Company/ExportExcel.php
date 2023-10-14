<?php

namespace App\Http\Controllers\Company;

use Illuminate\Routing\Controller;
use LaravelLiberu\Companies\Tables\Builders\Company;
use LaravelLiberu\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected $tableClass = Company::class;
}
