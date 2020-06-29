<?php

namespace App\Http\Controllers\Familyevents;

use App\FamilyEvent;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\App\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = FamilyEvent::class;

    //protected $queryAttributes = ['name'];

    //public function query(Request $request)
    //{
    //    return FamilyEvent::query();
    //}
}
