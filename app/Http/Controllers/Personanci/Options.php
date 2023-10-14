<?php

namespace App\Http\Controllers\Personanci;

use App\Models\PersonAnci;
use Illuminate\Routing\Controller;
use LaravelLiberu\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = PersonAnci::class;

    protected $queryAttributes = ['anci'];

    //public function query(Request $request)
    //{
    //    return PersonAnci::query();
    //}
}
