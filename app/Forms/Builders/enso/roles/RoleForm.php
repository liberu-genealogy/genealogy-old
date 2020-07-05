<?php

namespace App\Forms\Builders\enso\Roles;

use App\Models\enso\Menus\Menu;
use App\Models\enso\Roles\Role;
use LaravelEnso\Forms\Services\Form;

class RoleForm
{
    protected const FormPath = __DIR__.'/../../../Templates/enso/roles/role.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = (new Form(static::FormPath))
            ->options('menu_id', Menu::isNotParent()->get(['name', 'id']));
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Role $role)
    {
        return $this->form->edit($role);
    }
}
