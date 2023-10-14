<?php

namespace App\Http\Controllers\Citations;

use App\Models\Citation;
use Illuminate\Routing\Controller;
use LaravelLiberu\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = Citation::class;

    //protected $queryAttributes = ['name'];

    //public function query(Request $request)
    //{
    //    return Citation::query();
    //}
}
