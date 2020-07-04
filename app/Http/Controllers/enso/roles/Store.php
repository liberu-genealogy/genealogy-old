<?php

namespace App\Http\Controllers\enso\Roles;

use App\Models\enso\Roles\Role;
use Illuminate\Routing\Controller;
use LaravelEnso\Roles\Http\Requests\ValidateRoleRequest;

class Store extends Controller
{
    public function __invoke(ValidateRoleRequest $request, Role $role)
    {
        $role->fill($request->validated())->save();
        $role->addDefaultPermissions();

        return [
            'message' => __('The role was created!'),
            'redirect' => 'system.roles.edit',
            'param' => ['role' => $role->id],
        ];
    }
}
