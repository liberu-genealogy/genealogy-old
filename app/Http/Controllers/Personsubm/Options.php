<?php

namespace App\Http\Controllers\Personsubm;

use App\Models\PersonSubm;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = PersonSubm::class;

    protected $queryAttributes = ['subm'];

    //public function query(Request $request)
    //{
    //    return PersonSubm::query();
    //}
}
