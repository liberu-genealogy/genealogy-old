<?php

namespace App\Http\Controllers\enso\Impersonate;

use Illuminate\Routing\Controller;

class Stop extends Controller
{
    public function __invoke()
    {
        session()->forget('impersonating');

        return ['message' => __('Welcome Back')];
    }
}
