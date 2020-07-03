<?php

namespace App\Http\Controllers\Personevent;

use App\PersonEvent;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\App\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = PersonEvent::class;

    //protected $queryAttributes = ['name'];

    //public function query(Request $request)
    //{
    //    return PersonEvent::query();
    //}
}
