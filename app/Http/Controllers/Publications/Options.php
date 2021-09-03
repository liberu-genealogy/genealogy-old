<?php

namespace App\Http\Controllers\Publications;

use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = Publication::class;

    //protected $queryAttributes = ['name'];

    //public function query(Request $request)
    //{
    //    return Publication::query();
    //}
}
