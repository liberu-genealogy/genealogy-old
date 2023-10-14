<?php

namespace App\Http\Controllers\Notes;

use App\Models\Note;
use Illuminate\Routing\Controller;
use LaravelLiberu\Select\Traits\OptionsBuilder;

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
