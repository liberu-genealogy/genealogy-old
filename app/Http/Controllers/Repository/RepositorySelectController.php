<?php

namespace App\Http\Controllers\Repository;

use App\Repository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelEnso\Select\app\Traits\OptionsBuilder;

class RepositorySelectController extends Controller
{
    use OptionsBuilder;

    protected $model = Repository::class;

    //protected $queryAttributes = ['name'];

    //public function query(Request $request)
    //{
    //    return Repository::query();
    //}
}
