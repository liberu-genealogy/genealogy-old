<?php

namespace App\Http\Controllers\Places;

use App\Place;
use App\Http\Controllers\Controller;
use LaravelEnso\Select\app\Traits\OptionsBuilder;

class PlaceSelectController extends Controller
{
    use OptionsBuilder;

    protected $model = Place::class;

    //protected $queryAttributes = ['name'];

    //public function query()
    //{
    //    return Place::query();
    //}
}
