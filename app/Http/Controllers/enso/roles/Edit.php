<?php

namespace App\Http\Controllers\enso\Roles;

use App\Forms\Builders\enso\Roles\RoleForm;
use App\Models\enso\Roles\Role;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(Role $role, RoleForm $form)
    {
        return ['form' => $form->edit($role)];
    }
}
