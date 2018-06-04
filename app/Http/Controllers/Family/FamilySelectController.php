<?php

namespace App\Http\Controllers\Administration\Family;

use App\Family;
use App\Http\Controllers\Controller;
use LaravelEnso\Select\app\Traits\OptionsBuilder;

class FamilySelectController extends Controller
{
    use OptionsBuilder;

    public function query()
    {
        return Family::active();
    }
}
