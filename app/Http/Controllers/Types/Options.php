<?php

namespace App\Http\Controllers\Types;

use App\Type;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\App\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = Type::class;

    //protected $queryAttributes = ['name'];

    //public function query(Request $request)
    //{
    //    return Type::query();
    //}
}
