<?php

namespace App\Http\Controllers\Company;

use App\Tables\Builders\CompanyTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected $tableClass = CompanyTable::class;
}
