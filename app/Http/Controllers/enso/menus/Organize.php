<?php

namespace App\Http\Controllers\enso\Menus;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Service\enso\menus\Organizer;

class Organize extends Controller
{
    public function __invoke(Request $request)
    {
        (new Organizer($request->get('menus')))->handle();

        return ['message' => __('The menu order has been sucessfully updated')];
    }
}
