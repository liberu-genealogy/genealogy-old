<?php

namespace App\Http\Controllers\Authors;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = Author::class;

    //protected $queryAttributes = ['name'];

    //public function query(Request $request)
    //{
    //    return Author::query();
    //}
}
