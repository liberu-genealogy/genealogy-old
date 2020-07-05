<?php

namespace App\Http\Controllers\enso\Menus;

use App\Forms\Builders\enso\Menus\MenuForm;
use Illuminate\Routing\Controller;

class Create extends Controller
{
    public function __invoke(MenuForm $form)
    {
        return ['form' => $form->create()];
    }
}
