<?php

namespace App\Http\Controllers\Chan;

use App\Chan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\App\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = Chan::class;

    //protected $queryAttributes = ['name'];

    //public function query(Request $request)
    //{
    //    return Chan::query();
    //}
}
