<?php

namespace App\Http\Controllers\enso\core\Administration\UserGroup;

use App\Models\enso\core\UserGroup;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(UserGroup $userGroup)
    {
        $userGroup->delete();

        return [
            'message' => __('The user group was successfully deleted'),
            'redirect' => 'administration.userGroups.index',
        ];
    }
}
