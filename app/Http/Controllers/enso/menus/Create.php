<?php

namespace App\Http\Controllers\enso\Menus;

use Illuminate\Routing\Controller;
use App\Forms\Builders\enso\Menus\MenuForm;

class Create extends Controller
{
    public function __invoke(MenuForm $form)
    {
        return ['form' => $form->create()];
    }
}
