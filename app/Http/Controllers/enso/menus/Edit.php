<?php

namespace App\Http\Controllers\enso\Menus;

use App\Forms\Builders\enso\Menus\MenuForm;
use App\Models\enso\Menus\Menu;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(Menu $menu, MenuForm $form)
    {
        return ['form' => $form->edit($menu)];
    }
}
