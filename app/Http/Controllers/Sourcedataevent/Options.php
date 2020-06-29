<?php

namespace App\Http\Controllers\Sourcedataevent;

use App\SourceDataEven;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\App\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = SourceDataEven::class;

    //protected $queryAttributes = ['name'];

    //public function query(Request $request)
    //{
    //    return SourceDataEven::query();
    //}
}
