<?php

namespace App\Http\Controllers\Refn;

use App\Refn;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = Refn::class;

    //protected $queryAttributes = ['name'];

    //public function query(Request $request)
    //{
    //    return Refn::query();
    //}
}
