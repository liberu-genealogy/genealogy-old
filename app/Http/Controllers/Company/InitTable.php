<?php

namespace App\Http\Controllers\Company;

use Illuminate\Routing\Controller;
use App\Tables\Builders\Company;
use LaravelEnso\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected $tableClass = Company::class;
}
