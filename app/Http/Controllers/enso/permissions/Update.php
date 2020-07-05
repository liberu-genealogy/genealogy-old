<?php

namespace App\Http\Controllers\enso\permissions;

use App\Models\enso\permissions\Permission;
use Illuminate\Routing\Controller;
use Laravelenso\permissions\Http\Requests\ValidatePermissionRequest;

class Update extends Controller
{
    public function __invoke(ValidatePermissionRequest $request, Permission $permission)
    {
        $permission->updateWithRoles(
            $request->validatedExcept('roles'),
            $request->get('roles')
        );

        return ['message' => __('The permission was successfully updated')];
    }
}
