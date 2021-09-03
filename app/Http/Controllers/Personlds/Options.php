<?php

namespace App\Http\Controllers\Personlds;

use App\Models\PersonLds;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = PersonLds::class;

    protected $queryAttributes = ['type'];

    //public function query(Request $request)
    //{
    //    return PersonLds::query();
    //}
}
