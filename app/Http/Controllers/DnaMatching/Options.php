<?php

namespace App\Http\Controllers\DnaMatching;

use App\Models\DnaMatching;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = DnaMatching::class;

    protected $queryAttributes = ['name'];

    //public function query(Request $request)
    //{
    //    return DnaMatching::query();
    //}
}
