<?php

namespace App\Http\Controllers\Individual;

use App\Individual;
use App\Http\Controllers\Controller;
use LaravelEnso\Select\app\Traits\OptionsBuilder;

class IndividualSelectController extends Controller
{
    use OptionsBuilder;

    protected $model = Individual::class;

    //protected $queryAttributes = ['name'];

    //public function query()
    //{
    //    return Individual::query();
    //}
}
