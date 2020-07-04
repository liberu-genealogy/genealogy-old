<?php

namespace App\Http\Controllers\enso\Roles;

use App\Models\enso\Roles\Role;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(Role $role)
    {
        $role->delete();

        return [
            'message' => __('The role was successfully deleted'),
            'redirect' => 'system.roles.index',
        ];
    }
}
