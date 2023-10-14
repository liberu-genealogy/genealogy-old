<?php

namespace App\Http\Controllers\Personevent;

use App\Models\PersonEvent;
use Illuminate\Routing\Controller;
use LaravelLiberu\Select\Traits\OptionsBuilder;

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
