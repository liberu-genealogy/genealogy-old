<?php

namespace App\Http\Controllers\enso\Menus;

use Illuminate\Routing\Controller;
use LaravelEnso\Menus\Http\Requests\ValidateMenuRequest;
use App\Models\enso\Menus\Menu;

class Update extends Controller
{
    public function __invoke(ValidateMenuRequest $request, Menu $menu)
    {
        $menu->update($request->validated());

        return ['message' => __('The menu was successfully updated')];
    }
}
