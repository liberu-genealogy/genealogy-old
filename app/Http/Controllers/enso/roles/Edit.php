<?php

namespace App\Http\Controllers\enso\Roles;

use Illuminate\Routing\Controller;
use App\Models\enso\Roles\Role;
use App\Forms\Builders\enso\Roles\RoleForm;

class Edit extends Controller
{
    public function __invoke(Role $role, RoleForm $form)
    {
        return ['form' => $form->edit($role)];
    }
}
