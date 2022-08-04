<?php

namespace App\Http\Controllers\Company;

use Illuminate\Routing\Controller;
use LaravelEnso\Companies\Models\Company;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected $model = Company::class;

    protected $queryAttributes = ['name', 'fiscal_code', 'phone'];
}
