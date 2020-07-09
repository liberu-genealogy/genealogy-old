<?php

namespace App\Http\Controllers\Profile;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = Profile::class;

    //protected $queryAttributes = ['name'];

    //public function query(Request $request)
    //{
    //    return Profile::query();
    //}
}
