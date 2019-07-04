<?php

namespace App\Http\Controllers\Repository;

use App\repository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\app\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected $model = repository::class;

    //protected $queryAttributes = ['name'];

    //public function query(Request $request)
    //{
    //    return repository::query();
    //}
}
