<?php

namespace App\Http\Controllers\enso\permissions;

use App\Models\enso\permissions\Permission;
use Illuminate\Routing\Controller;
use Laravelenso\permissions\Http\Requests\ValidatePermissionRequest;

class Store extends Controller
{
    public function __invoke(ValidatePermissionRequest $request, Permission $permission)
    {
        $permission = $permission->storeWithRoles(
            $request->validatedExcept('roles'),
            $request->get('roles'),
        );

        return [
            'message' => __('The permission was created!'),
            'redirect' => 'system.permissions.edit',
            'param' => ['permission' => $permission->id],
        ];
    }
}
