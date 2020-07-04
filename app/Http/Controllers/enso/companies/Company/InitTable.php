<?php

namespace App\Http\Controllers\enso\companies\Company;

use Illuminate\Routing\Controller;
use LaravelEnso\Companies\Tables\Builders\CompanyTable;
use LaravelEnso\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected $tableClass = CompanyTable::class;
}
