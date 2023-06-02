<?php

namespace App\Http\Controllers\Refn;

use App\Models\Refn;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = Refn::class;

    protected $queryAttributes = ['refn'];

    //public function query(Request $request)
    //{
    //    return Refn::query();
    //}
}
