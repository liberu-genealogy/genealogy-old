<?php

namespace App\Http\Controllers\Note;

use App\Http\Controllers\Controller;
use App\Note;
use LaravelEnso\Select\app\Traits\OptionsBuilder;

class NoteSelectController extends Controller
{
    use OptionsBuilder;

    protected $model = Note::class;

    protected $queryAttributes = [
        'name', 'description', 'date',
    ];
}
