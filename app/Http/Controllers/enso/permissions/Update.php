<?php

namespace App\Http\Controllers\enso\Permissions;

use Illuminate\Routing\Controller;
use LaravelEnso\Permissions\Http\Requests\ValidatePermissionRequest;
use App\Models\enso\Permissions\Permission;

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
