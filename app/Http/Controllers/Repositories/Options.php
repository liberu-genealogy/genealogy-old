<?php

namespace App\Http\Controllers\Repositories;

use App\Repository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\App\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = Repository::class;

    //protected $queryAttributes = ['name'];

    //public function query(Request $request)
    //{
    //    return Repository::query();
    //}
}
