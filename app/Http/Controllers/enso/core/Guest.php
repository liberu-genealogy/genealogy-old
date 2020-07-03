<?php

namespace App\Http\Controllers\enso\core;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Http\Response\enso\core\GuestState;

class Guest extends Controller
{
    public function __invoke()
    {
        return new GuestState();
    }
}
