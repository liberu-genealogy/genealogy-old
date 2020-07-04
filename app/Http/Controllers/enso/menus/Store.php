<?php

namespace App\Http\Controllers\enso\Menus;

use App\Models\enso\Menus\Menu;
use Illuminate\Routing\Controller;
use LaravelEnso\Menus\Http\Requests\ValidateMenuRequest;

class Store extends Controller
{
    public function __invoke(ValidateMenuRequest $request, Menu $menu)
    {
        $menu->fill($request->validated())->save();

        return [
            'message' => __('The menu was created!'),
            'redirect' => 'system.menus.edit',
            'param' => ['menu' => $menu->id],
        ];
    }
}
