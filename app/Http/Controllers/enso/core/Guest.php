<?php

namespace App\Http\Controllers\enso\core;

use App\Http\Response\enso\core\GuestState;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class Guest extends Controller
{
    public function __invoke()
    {
        return new GuestState();
    }
}
