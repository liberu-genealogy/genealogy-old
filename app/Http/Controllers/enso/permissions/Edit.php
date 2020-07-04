<?php

namespace App\Http\Controllers\enso\Permissions;

use Illuminate\Routing\Controller;
use App\Forms\Builders\enso\Permissions\PermissionForm;
use App\Models\enso\Permissions\Permission;

class Edit extends Controller
{
    public function __invoke(Permission $permission, PermissionForm $form)
    {
        return ['form' => $form->edit($permission)];
    }
}
