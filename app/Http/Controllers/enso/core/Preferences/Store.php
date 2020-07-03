<?php

namespace App\Http\Controllers\enso\core\Preferences;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class Store extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->has('global')) {
            Auth::user()->storeGlobalPreferences($request->get('global'));

            return;
        }

        Auth::user()->storeLocalPreferences(
            $request->get('route'), $request->get('value')
        );
    }
}
