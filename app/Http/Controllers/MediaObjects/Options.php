<?php

namespace App\Http\Controllers\MediaObjects;

use App\Models\MediaObject;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = MediaObject::class;

    protected $queryAttributes = ['titl'];

    //public function query(Request $request)
    //{
    //    return MediaObject::query();
    //}
}
