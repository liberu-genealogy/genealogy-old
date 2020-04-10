<?php

namespace App\Http\Controllers\Citations;

use App\Citation;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\App\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = Citation::class;

    //protected $queryAttributes = ['name'];

    //public function query(Request $request)
    //{
    //    return Citation::query();
    //}
}
