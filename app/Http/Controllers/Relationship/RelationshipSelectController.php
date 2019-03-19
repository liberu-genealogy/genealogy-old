<?php

namespace App\Http\Controllers\Relationship;

use App\Relationship;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelEnso\Select\app\Traits\OptionsBuilder;

class RelationshipSelectController extends Controller
{
    use OptionsBuilder;

    protected $model = Relationship::class;

    //protected $queryAttributes = ['name'];

    //public function query(Request $request)
    //{
    //    return Relationship::query();
    //}
}
