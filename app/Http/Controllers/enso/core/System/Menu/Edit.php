<?php

namespace App\Http\Controllers\enso\core\System\Menu;

use App\Models\enso\Menus\Menu;
use Illuminate\Routing\Controller;
use LaravelEnso\Menus\Forms\Builders\MenuForm;

class Edit extends Controller
{
    public function __invoke(Menu $menu, MenuForm $form)
    {
        return ['form' => $form->edit($menu)];
    }
}
