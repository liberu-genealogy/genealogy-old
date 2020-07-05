<?php

namespace App\Http\Response\enso\Tutorials;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Collection;
use App\Models\enso\Permissions\Permission;
use LaravelEnso\Tutorials\Http\Resources\Tutorial as Resource;
use App\Models\enso\Tutorials\Tutorial;

class Index implements Responsable
{
    private $route;

    public function toResponse($request)
    {
        $this->route = $request->get('route');

        return Resource::collection($this->tutorials());
    }

    private function tutorials()
    {
        return $this->homeTutorials()
            ->merge($this->routeTutorials());
    }

    private function homeTutorials()
    {
        $home = Permission::whereName(config('enso.tutorials.homePermission'))->first();

        return Tutorial::wherePermissionId(optional($home)->id)
            ->orderBy('order_index')
            ->get();
    }

    private function routeTutorials()
    {
        $permission = Permission::whereName($this->route)->first();

        return $permission
            ? $permission->tutorials()->orderBy('order_index')->get()
            : new Collection();
    }
}
