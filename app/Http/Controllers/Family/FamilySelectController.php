<?php

namespace App\Http\Controllers\Family;

use App\Family;
use App\Http\Controllers\Controller;
use LaravelEnso\Select\app\Traits\OptionsBuilder;

class FamilySelectController extends Controller
{
    use OptionsBuilder;

    protected $model = Family::class;

    //protected $queryAttributes = ['name'];

    //public function query()
    //{
    //    return Family::query();
    //}
}
