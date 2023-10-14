<?php

namespace App\Http\Controllers\Sourcedata;

use App\Models\SourceData;
use Illuminate\Routing\Controller;
use LaravelLiberu\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = SourceData::class;

    protected $queryAttributes = ['group'];

    //public function query(Request $request)
    //{
    //    return SourceData::query();
    //}
}
