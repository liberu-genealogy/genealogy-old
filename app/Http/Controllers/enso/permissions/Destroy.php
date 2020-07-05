<?php

namespace App\Http\Controllers\enso\permissions;

use App\Models\enso\permissions\Permission;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(Permission $permission)
    {
        $permission->delete();

        return [
            'message' => __('The permission was successfully deleted'),
            'redirect' => 'system.permissions.index',
        ];
    }
}
