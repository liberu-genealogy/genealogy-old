<?php

namespace App\Http\Controllers\Personalias;

use App\Models\PersonAlia;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = PersonAlia::class;

    protected $queryAttributes = ['alia'];

    //public function query(Request $request)
    //{
    //    return PersonAlia::query();
    //}
}
