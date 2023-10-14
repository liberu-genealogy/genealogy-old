<?php

namespace App\Http\Controllers\Publications;

use App\Models\Publication;
use Illuminate\Routing\Controller;
use LaravelLiberu\Select\Traits\OptionsBuilder;

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
