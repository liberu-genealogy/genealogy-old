<?php

namespace App\Http\Controllers\enso\companies\Company;

use Illuminate\Routing\Controller;
use App\Models\enso\companies\Company;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected $model = Company::class;

    protected $queryAttributes = ['name', 'fiscal_code', 'phone'];
}
