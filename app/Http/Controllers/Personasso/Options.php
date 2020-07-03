<?php

namespace App\Http\Controllers\Personasso;

use App\PersonAsso;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\App\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = PersonAsso::class;

    //protected $queryAttributes = ['name'];

    //public function query(Request $request)
    //{
    //    return PersonAsso::query();
    //}
}
