<?php

namespace App\Http\Controllers\Place;

use App\Place;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelEnso\Select\app\Traits\OptionsBuilder;

class PlaceSelectController extends Controller
{
    use OptionsBuilder;

    protected $model = Place::class;

    //protected $queryAttributes = ['name'];

    //public function query(Request $request)
    //{
    //    return Place::query();
    //}
}
