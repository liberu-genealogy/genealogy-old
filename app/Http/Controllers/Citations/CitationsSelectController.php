<?php

namespace App\Http\Controllers\Citations;

use App\Citations;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelEnso\Select\app\Traits\OptionsBuilder;

class CitationsSelectController extends Controller
{
    use OptionsBuilder;

    protected $model = Citations::class;

    //protected $queryAttributes = ['name'];

    //public function query(Request $request)
    //{
    //    return Citations::query();
    //}
}
