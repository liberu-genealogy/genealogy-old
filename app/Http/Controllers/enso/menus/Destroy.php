<?php

namespace App\Http\Controllers\enso\Menus;

use App\Models\enso\Menus\Menu;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(Menu $menu)
    {
        $menu->delete();

        return [
            'message' => __('The menu was successfully deleted'),
            'redirect' => 'system.menus.index',
        ];
    }
}
