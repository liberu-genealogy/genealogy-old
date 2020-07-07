<?php

namespace App\Service\enso\menus;

use App\Models\enso\Menus\Menu;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TreeBuilder
{
    private Collection $permissions;
    private Collection $menus;

    public function handle()
    {
        return $this->permissions()
            ->menus()
            ->filter()
            ->map()
            ->build();
    }

    private function build(?int $parentId = null): Collection
    {
        return $this->menus
            ->filter(fn ($menu) => $menu->parent_id === $parentId)
            ->reduce(fn ($tree, $menu) => $tree
                ->push($this->withChildren($menu)), new Collection());
    }

    private function withChildren(Menu $menu): Menu
    {
        $menu->children = $menu->has_children
            ? $this->build($menu->id)
            : null;

        $menu->route = optional($menu->permission)->name;

        unset($menu->permission);

        return $menu;
    }

    private function permissions(): self
    {
        $this->permissions = Auth::user()->role
            ->permissions()
            ->has('menu')
            ->get(['id', 'name']);
            error_log('//////////////////////////////////////////////////'.json_encode($this->permissions));

        return $this;
    }

    private function menus(): self
    {
        $this->menus = Menu::with('permission:id,name')
            ->orderBy('order_index')
            ->get(['id', 'parent_id', 'permission_id', 'name', 'icon', 'has_children']);

        return $this;
    }

    private function filter(): self
    {
        $this->menus = $this->menus->filter(fn ($menu) => $this->allowed($menu));

        return $this;
    }

    private function map(): self
    {
        $this->menus = $this->menus->map(fn ($menu) => $this->computeIcon($menu));

        return $this;
    }

    private function computeIcon(Menu $menu): Menu
    {
        if (Str::contains($menu->icon, ' ')) {
            $menu->icon = explode(' ', $menu->icon);
        }

        return $menu;
    }

    private function allowed($menu): bool
    {
        return $this->permissions->pluck('id')->contains($menu->permission_id)
            || $menu->has_children && $this->someChildrenAllowed($menu);
    }

    private function someChildrenAllowed($parent): bool
    {
        return $this->menus->some(
            fn ($child) => $child->parent_id === $parent->id && $this->allowed($child)
        );
    }
}
