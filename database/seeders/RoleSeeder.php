<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use LaravelEnso\Menus\Models\Menu;
use LaravelEnso\Permissions\Models\Permission;
use LaravelEnso\Roles\Models\Role;

class RoleSeeder extends Seeder
{
    private const Roles = [
        ['name' => 'admin', 'display_name' => 'Administrator', 'description' => 'Administrator Role. Full Featured.'],
        ['name' => 'supervisor', 'display_name' => 'Supervisor', 'description' => 'Supervisor Role.'],
        ['name' => 'moderator', 'display_name' => 'Moderator', 'description' => 'Moderator Role.'],
        ['name' => 'free', 'display_name' => 'Free', 'description' => 'Free Role.'],
        ['name' => 'otm', 'display_name' => 'One Tree Monthly', 'description' => 'One Tree Monthly Role'],
        ['name' => 'oty', 'display_name' => 'One Tree Yearly', 'description' => 'One Tree Yearly Role.'],
        ['name' => 'ttm', 'display_name' => 'Ten Tree Monthly', 'description' => 'Ten Tree Monthly Role.'],
        ['name' => 'tty', 'display_name' => 'Ten Tree Yearly', 'description' => 'Ten Tree Yearly Role.'],
        ['name' => 'utm', 'display_name' => 'Unlimited Tree Monthly', 'description' => 'Unlimited Tree Monthly Role.'],      
        ['name' => 'uty', 'display_name' => 'Unlimited Tree Yearly', 'description' => 'Unlimited Tree Yearly Role.'],   
    ];

    public function run()
    {
        $menu = Menu::firstWhere('name', 'Dashboard');

        $roles = Collection::wrap(self::Roles)
            ->map(fn ($role) => Role::factory()
                ->create($role + ['menu_id' => $menu->id]));

        $admin = $roles->first();

        $admin->permissions()->sync(Permission::pluck('id'));

        $supervisor = $roles->where('name' == 'supervisor')->();

        $supervisor->permissions()->sync(Permission::implicit()->pluck('id'));
    }
}
