<?php

namespace App\Http\Controllers\enso\Roles;

use Illuminate\Routing\Controller;
use App\Http\Requests\enso\Roles\ValidateRoleRequest;
use App\Models\enso\Roles\Role;

class Update extends Controller
{
    public function __invoke(ValidateRoleRequest $request, Role $role)
    {
        $role->update($request->validated());

        return ['message' => __('The role was successfully updated')];
    }
}
