<?php

namespace App\Http\Controllers\enso\Menus;

use Illuminate\Routing\Controller;
use App\Forms\Builders\enso\Menus\MenuForm;
use App\Models\enso\Menus\Menu;

class Edit extends Controller
{
    public function __invoke(Menu $menu, MenuForm $form)
    {
        return ['form' => $form->edit($menu)];
    }
}