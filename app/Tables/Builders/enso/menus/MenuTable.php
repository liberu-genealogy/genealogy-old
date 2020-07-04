<?php

namespace App\Tables\Builders\enso\Menus;

use App\Models\enso\Menus\Menu;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class MenuTable implements Table
{
    protected const TemplatePath = __DIR__.'/../../../Templates/enso/menus/menus.json';

    public function query(): Builder
    {
        return Menu::selectRaw('
            menus.id, menus.name, menus.icon, menus.has_children, menus.order_index,
            parent_menus.name as parent, permissions.name as route, menus.created_at
        ')->leftJoin('permissions', 'menus.permission_id', '=', 'permissions.id')
            ->leftJoin('menus as parent_menus', 'menus.parent_id', '=', 'parent_menus.id');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
