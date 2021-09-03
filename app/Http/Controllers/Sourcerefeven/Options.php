<?php

namespace App\Http\Controllers\Sourcerefeven;

use App\Models\SourceRefEven;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = SourceRefEven::class;

    protected $queryAttributes = ['even'];

    //public function query(Request $request)
    //{
    //    return SourceRefEven::query();
    //}
}
