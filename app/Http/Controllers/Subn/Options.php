<?php

namespace App\Http\Controllers\Subn;

use App\Models\Subn;
use Illuminate\Routing\Controller;
use LaravelLiberu\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = Subn::class;

    protected $queryAttributes = ['subm'];

    //public function query(Request $request)
    //{
    //    return Subn::query();
    //}
}
