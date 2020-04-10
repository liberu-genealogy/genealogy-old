<?php

namespace App\Http\Controllers\Notes;

use App\Note;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\App\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = Note::class;

    //protected $queryAttributes = ['name'];

    //public function query(Request $request)
    //{
    //    return Note::query();
    //}
}
