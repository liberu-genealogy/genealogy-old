<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use LaravelEnso\Permissions\Models\Permission;
use LaravelEnso\Roles\Models\Role;

class CustomPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $link = [
        'administration.people.initTable',
        'administration.people.tableData',
        'administration.people.exportExcel',
        'administration.people.options',
        'administration.people.create',
        'administration.people.edit',
        'administration.people.index',
        'administration.people.store',
        'administration.people.update',
        'administration.people.destroy',
        'administration.users.initTable',
        'administration.users.tableData',
        'administration.users.exportExcel',
        'administration.users.options',
        'administration.users.create',
        'administration.users.edit',
        'administration.users.index',
        'administration.users.show',
        'administration.users.store',
        'administration.users.update',
        'administration.users.destroy',
        'administration.users.token',
        'administration.companies.initTable',
        'administration.companies.tableData',
        'administration.companies.exportExcel',
        'administration.companies.options',
        'administration.companies.create',
        'administration.companies.edit',
        'administration.companies.index',
        'administration.companies.store',
        'administration.companies.update',
        'administration.companies.destroy',
        'administration.companies.people.create',
        'administration.companies.people.edit',
        'administration.companies.people.index',
        'administration.companies.people.store',
        'administration.companies.people.update',
        'administration.companies.people.destroy',
    ];

    public function run()
    {
        $c_role = Role::where('name', 'supervisor')->first();
        $role_id = $c_role->id;
        foreach ($this->link as $link) {
            $permission = Permission::where('name', $link)->first();
            if ($permission !== null) {
                $permission->roles()->detach($role_id);
                $permission->roles()->attach($role_id);
            }
        }
    }
}
