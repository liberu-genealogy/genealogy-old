<?php

namespace App\Http\Controllers\Families;

use App\Family;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\App\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = Family::class;

    //protected $queryAttributes = ['name'];

    //public function query(Request $request)
    //{
    //    return Family::query();
    //}
}
