<?php

namespace App\Tables\Builders\enso\Roles;

use Illuminate\Database\Eloquent\Builder;
use App\Models\enso\Roles\Role;
use LaravelEnso\Tables\Contracts\Table;

class RoleTable implements Table
{
    protected const TemplatPath = __DIR__.'/../../../Templates/enso/roles/roles.json';

    public function query(): Builder
    {
        return Role::selectRaw('
            roles.id, roles.name, roles.display_name, roles.description,
            roles.created_at, menus.name as defaultMenu
        ')->leftJoin('menus', 'roles.menu_id', '=', 'menus.id');
    }

    public function templatePath(): string
    {
        return static::TemplatPath;
    }
}
