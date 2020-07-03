<?php

namespace App\Http\Controllers\Personalias;

use App\PersonAlia;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\App\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = PersonAlia::class;

    //protected $queryAttributes = ['name'];

    //public function query(Request $request)
    //{
    //    return PersonAlia::query();
    //}
}
