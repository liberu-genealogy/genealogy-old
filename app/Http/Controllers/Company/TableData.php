<?php

namespace App\Http\Controllers\Company;

use Illuminate\Routing\Controller;
use App\Tables\Builders\CompanyTable;
use LaravelEnso\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected $tableClass = CompanyTable::class;
}
