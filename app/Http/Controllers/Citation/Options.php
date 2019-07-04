<?php

namespace App\Http\Controllers\Citation;

use App\Citation;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\app\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected $model = Citation::class;

    //protected $queryAttributes = ['name'];

    //public function query(Request $request)
    //{
    //    return Citation::query();
    //}
}
