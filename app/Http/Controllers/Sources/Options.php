<?php

namespace App\Http\Controllers\Sources;

use App\Models\Source;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = Source::class;

    //protected $queryAttributes = ['name'];

    //public function query(Request $request)
    //{
    //    return Source::query();
    //}
}
