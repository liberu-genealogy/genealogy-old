<?php

namespace App\Http\Controllers\Personasso;

use App\Models\PersonAsso;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\Traits\OptionsBuilder;

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
