<?php

namespace App\Http\Controllers\Personevent;

use App\Models\PersonEvent;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = PersonEvent::class;

    protected $queryAttributes = ['title'];

    //public function query(Request $request)
    //{
    //    return PersonEvent::query();
    //}
}
