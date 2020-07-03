<?php

namespace App\Http\Controllers\enso\core\System\Menu;

use Illuminate\Routing\Controller;
use LaravelEnso\Menus\Forms\Builders\MenuForm;
use App\Models\enso\Menus\Menu;

class Edit extends Controller
{
    public function __invoke(Menu $menu, MenuForm $form)
    {
        return ['form' => $form->edit($menu)];
    }
}
