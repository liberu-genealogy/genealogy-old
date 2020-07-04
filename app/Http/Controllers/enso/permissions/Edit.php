<?php

namespace App\Http\Controllers\enso\permissions;

use App\Forms\Builders\enso\permissions\PermissionForm;
use App\Models\enso\permissions\Permission;
use Illuminate\Routing\Controller;

class Edit extends Controller
{
    public function __invoke(Permission $permission, PermissionForm $form)
    {
        return ['form' => $form->edit($permission)];
    }
}
