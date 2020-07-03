<?php

namespace App\Http\Controllers\Subn;

use App\Subn;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = Subn::class;

    //protected $queryAttributes = ['name'];

    //public function query(Request $request)
    //{
    //    return Subn::query();
    //}
}
