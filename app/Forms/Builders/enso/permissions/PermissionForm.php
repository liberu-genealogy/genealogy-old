<?php

namespace App\Forms\Builders\enso\Permissions;

use App\Models\enso\Permissions\Permission;
use App\Models\enso\Roles\Role;
use LaravelEnso\Forms\Services\Form;

class PermissionForm
{
    protected const FormPath = __DIR__.'/../../../Templates/enso/permissions/permission.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = (new Form(static::FormPath))
            ->options('roles', Role::get(['name', 'id']));
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Permission $permission)
    {
        return $this->form->edit($permission);
    }
}
