<?php

namespace App\Http\Controllers\Personasso;

use App\Models\PersonAsso;
use Illuminate\Routing\Controller;
use LaravelLiberu\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = PersonAsso::class;

    protected $queryAttributes = ['indi'];

    //public function query(Request $request)
    //{
    //    return PersonAsso::query();
    //}
}
