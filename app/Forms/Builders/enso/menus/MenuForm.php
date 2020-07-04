<?php

namespace App\Forms\Builders\enso\Menus;

use LaravelEnso\Forms\Services\Form;
use App\Models\enso\Menus\Menu;
use App\Models\enso\Permissions\Permission;

class MenuForm
{
    protected const FormPath = __DIR__.'/../../../Templates/enso/menus/menu.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = (new Form(static::FormPath))
            ->options('parent_id', Menu::isParent()->get(['id', 'name']))
            ->options('permission_id', Permission::get(['id', 'name']));
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Menu $menu)
    {
        return $this->form->edit($menu);
    }
}
