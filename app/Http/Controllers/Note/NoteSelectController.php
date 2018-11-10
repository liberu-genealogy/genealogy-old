<?php

namespace App\Http\Controllers\Note;

use App\Note;
use App\Http\Controllers\Controller;
use LaravelEnso\Select\app\Traits\OptionsBuilder;

class NoteSelectController extends Controller
{
    use OptionsBuilder;

    protected $model = Note::class;

    //protected $queryAttributes = ['name'];

    //public function query()
    //{
    //    return Note::query();
    //}
}
