<?php

namespace App\Http\Controllers\enso\permissions;

use Illuminate\Routing\Controller;
use App\Forms\Builders\enso\permissions\PermissionForm;
use App\Models\enso\permissions\Permission;

class Edit extends Controller
{
    public function __invoke(Permission $permission, PermissionForm $form)
    {
        return ['form' => $form->edit($permission)];
    }
}
