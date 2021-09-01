<?php

namespace App\Http\Controllers\Familyevents;

use App\Models\FamilyEvent;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = FamilyEvent::class;

    protected $queryAttributes = ['title'];

    //public function query(Request $request)
    //{
    //    return FamilyEvent::query();
    //}
}
