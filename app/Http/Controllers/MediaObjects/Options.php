<?php

namespace App\Http\Controllers\MediaObjects;

use App\MediaObject;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\App\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = MediaObject::class;

    //protected $queryAttributes = ['name'];

    //public function query(Request $request)
    //{
    //    return MediaObject::query();
    //}
}
