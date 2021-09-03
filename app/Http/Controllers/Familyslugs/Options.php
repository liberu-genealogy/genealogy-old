<?php

namespace App\Http\Controllers\Familyslugs;

use App\Models\FamilySlgs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = FamilySlgs::class;

    protected $queryAttributes = ['stat'];

    //public function query(Request $request)
    //{
    //    return FamilySlgs::query();
    //}
}
