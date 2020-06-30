<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use LaravelEnso\Permissions\App\Models\Permission;
use LaravelEnso\Roles\App\Models\Role;

class RoleSeeder extends Seeder
{
    private const Roles = [
        ['menu_id' => 1, 'name' => 'admin', 'display_name' => 'Administrator', 'description' => 'Administrator role. Full featured.'],
        ['menu_id' => 1, 'name' => 'supervisor', 'display_name' => 'Supervisor', 'description' => 'Supervisor role.'],
        ['menu_id' => 1, 'name' => 'user', 'display_name' => 'User', 'description' => 'User role.'],
    ];

    public function run()
    {
        $roles = (new Collection(self::Roles))
            ->map(fn ($role) => factory(Role::class)->create($role));

        $admin = $roles->first();

        $admin->permissions()->sync(Permission::pluck('id'));

        $supervisor = $roles->skip(1)->first();

        $supervisor->permissions()->sync(Permission::implicit()->pluck('id'));
        $user = $roles->last();

        $user->permissions()->sync(Permission::implicit()->pluck('id'));
    }
}
