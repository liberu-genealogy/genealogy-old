<?php

namespace App\Http\Controllers\Chan;

use App\Models\Chan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = Chan::class;

    protected $queryAttributes = ['group'];

    //public function query(Request $request)
    //{
    //    return Chan::query();
    //}
}
