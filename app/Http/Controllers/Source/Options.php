<?php

namespace App\Http\Controllers\Source;

use App\source;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\app\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected $model = source::class;

    //protected $queryAttributes = ['name'];

    //public function query(Request $request)
    //{
    //    return source::query();
    //}
}
