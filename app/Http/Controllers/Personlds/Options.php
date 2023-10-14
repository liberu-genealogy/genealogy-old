<?php

namespace App\Http\Controllers\Personlds;

use App\Models\PersonLds;
use Illuminate\Routing\Controller;
use LaravelLiberu\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = PersonLds::class;

    protected $queryAttributes = ['type'];

    //public function query(Request $request)
    //{
    //    return PersonLds::query();
    //}
}
