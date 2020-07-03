<?php

namespace App\Http\Controllers\Sourcedata;

use App\SourceData;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = SourceData::class;

    //protected $queryAttributes = ['name'];

    //public function query(Request $request)
    //{
    //    return SourceData::query();
    //}
}
