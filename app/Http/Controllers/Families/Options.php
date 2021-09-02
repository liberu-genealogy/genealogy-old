<?php

namespace App\Http\Controllers\Families;

use App\Models\Family;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = Family::class;

    protected $queryAttributes = ['chan'];

    //public function query(Request $request)
    //{
    //    return Family::query();
    //}
}
