<?php

namespace App\Http\Controllers\enso\core\Administration\UserGroup;

use Illuminate\Routing\Controller;
use LaravelEnso\Core\Http\Requests\ValidateUserGroupRequest;
use LaravelEnso\Core\Models\UserGroup;

class Update extends Controller
{
    public function __invoke(ValidateUserGroupRequest $request, UserGroup $userGroup)
    {
        $userGroup->updateWithRoles(
            $request->validatedExcept('roles'),
            $request->get('roles')
        );

        return ['message' => __('The user group was successfully updated')];
    }
}
