<?php

namespace App\Http\Controllers\enso\core\Administration\UserGroup;

use Illuminate\Routing\Controller;
use LaravelEnso\Core\Http\Requests\ValidateUserGroupRequest;
use LaravelEnso\Core\Models\UserGroup;

class Store extends Controller
{
    public function __invoke(ValidateUserGroupRequest $request, UserGroup $userGroup)
    {
        $userGroup = $userGroup->storeWithRoles(
            $request->validatedExcept('roles'),
            $request->get('roles')
        );

        return [
            'message' => __('The user group was successfully created'),
            'redirect' => 'administration.userGroups.edit',
            'param' => ['userGroup' => $userGroup->id],
        ];
    }
}
