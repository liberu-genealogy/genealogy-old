<?php

namespace App\Http\Controllers\enso\permissions;

use Illuminate\Routing\Controller;
use App\Models\enso\permissions\Permission;

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
