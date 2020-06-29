<?php

use LaravelEnso\Migrator\App\Database\Migration;

class CreateStructureForUserGroups extends Migration
{
    protected $permissions = [
        ['name' => 'administration.userGroups.initTable', 'description' => 'Init table for userGroups', 'is_default' => false],
        ['name' => 'administration.userGroups.tableData', 'description' => 'Get table data for userGroups', 'is_default' => false],
        ['name' => 'administration.userGroups.exportExcel', 'description' => 'Export excel for userGroups', 'is_default' => false],
        ['name' => 'administration.userGroups.create', 'description' => 'Create user group', 'is_default' => false],
        ['name' => 'administration.userGroups.edit', 'description' => 'Edit existing user group', 'is_default' => false],
        ['name' => 'administration.userGroups.index', 'description' => 'Show userGroups index', 'is_default' => false],
        ['name' => 'administration.userGroups.options', 'description' => 'Get options for select', 'is_default' => false],
        ['name' => 'administration.userGroups.store', 'description' => 'Store a newly created user group', 'is_default' => false],
        ['name' => 'administration.userGroups.update', 'description' => 'Update edited user group', 'is_default' => false],
        ['name' => 'administration.userGroups.destroy', 'description' => 'Delete user group', 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'User Groups', 'icon' => 'users', 'route' => 'administration.userGroups.index', 'order_index' => 500, 'has_children' => false,
    ];

    protected $parentMenu = 'Administration';
}
