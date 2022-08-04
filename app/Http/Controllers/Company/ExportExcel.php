<?php

namespace App\Http\Controllers\Company;

use Illuminate\Routing\Controller;
use LaravelEnso\Companies\Tables\Builders\Company;
use LaravelEnso\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected $tableClass = Company::class;
}
