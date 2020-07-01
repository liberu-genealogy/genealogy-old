<?php

namespace App\Http\Controllers\Personanci;

use App\PersonAnci;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = PersonAnci::class;

    //protected $queryAttributes = ['name'];

    //public function query(Request $request)
    //{
    //    return PersonAnci::query();
    //}
}
