<?php

namespace App\Http\Controllers\enso\companies\Company;

use Illuminate\Routing\Controller;
use LaravelEnso\Companies\Tables\Builders\CompanyTable;
use LaravelEnso\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected $tableClass = CompanyTable::class;
}
