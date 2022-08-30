<?php

namespace App\Http\Controllers\Company;

use App\Tables\Builders\CompanyTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected $tableClass = CompanyTable::class;
}
