<?php

namespace App\Http\Controllers\Administration\Owner;

use App\Http\Controllers\Controller;
use App\Owner;
use LaravelEnso\Select\app\Traits\OptionsBuilder;

class OwnerSelectController extends Controller
{
    use OptionsBuilder;

    public function query()
    {
        return Owner::active();
    }
}
