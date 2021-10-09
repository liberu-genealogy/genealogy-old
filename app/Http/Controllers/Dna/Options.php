<?php

namespace App\Http\Controllers\Dna;

use App\Models\Dna;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = Dna::class;

    protected $queryAttributes = ['name'];

    //public function query(Request $request)
    //{
    //    return Dna::query();
    //}
}
