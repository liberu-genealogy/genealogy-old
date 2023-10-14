<?php

namespace App\Http\Controllers\Subm;

use App\Models\Subm;
use Illuminate\Routing\Controller;
use LaravelLiberu\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = Subm::class;

    protected $queryAttributes = ['name'];

    //public function query(Request $request)
    //{
    //    return Subm::query();
    //}
}
