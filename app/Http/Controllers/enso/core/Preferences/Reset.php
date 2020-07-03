<?php

namespace App\Http\Controllers\enso\core\Preferences;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class Reset extends Controller
{
    public function __invoke(Request $request)
    {
        $request->user()->resetPreferences();
    }
}
