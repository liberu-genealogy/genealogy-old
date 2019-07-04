<?php

namespace App\Http\Controllers\Note;

use App\note;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\app\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected $model = note::class;

    //protected $queryAttributes = ['name'];

    //public function query(Request $request)
    //{
    //    return note::query();
    //}
}
