<?php

namespace App\Http\Controllers\Sourcerefevents;

use App\SourceRefEven;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\App\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = SourceRefEven::class;

    //protected $queryAttributes = ['name'];

    //public function query(Request $request)
    //{
    //    return SourceRefEven::query();
    //}
}
