<?php

namespace App\Http\Controllers\enso\Menus;

use Illuminate\Routing\Controller;
use LaravelEnso\Menus\Http\Requests\ValidateMenuRequest;
use App\Models\enso\Menus\Menu;

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
