<?php

namespace App\Http\Controllers\Sources;

use App\Source;
use App\Http\Controllers\Controller;
use LaravelEnso\Select\app\Traits\OptionsBuilder;

class SourceSelectController extends Controller
{
    use OptionsBuilder;

    protected $model = Source::class;

    //protected $queryAttributes = ['name'];

    //public function query()
    //{
    //    return Source::query();
    //}
}
