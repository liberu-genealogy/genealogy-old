<?php

namespace App\Http\Controllers\enso\Menus;

use App\Models\enso\Menus\Menu;
use Illuminate\Routing\Controller;
use LaravelEnso\Menus\Http\Requests\ValidateMenuRequest;

class Update extends Controller
{
    public function __invoke(ValidateMenuRequest $request, Menu $menu)
    {
        $menu->update($request->validated());

        return ['message' => __('The menu was successfully updated')];
    }
}
