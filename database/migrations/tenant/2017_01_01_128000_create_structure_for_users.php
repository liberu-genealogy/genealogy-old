<?php

use LaravelEnso\Migrator\App\Database\Migration;

class CreateStructureForUsers extends Migration
{
    protected $permissions = [
        ['name' => 'administration.users.initTable', 'description' => 'Init table for users', 'is_default' => false],
        ['name' => 'administration.users.tableData', 'description' => 'Get table data for users', 'is_default' => false],
        ['name' => 'administration.users.exportExcel', 'description' => 'Export excel for users', 'is_default' => false],
        ['name' => 'administration.users.options', 'description' => 'Get options for select', 'is_default' => false],
        ['name' => 'administration.users.create', 'description' => 'Create user', 'is_default' => false],
        ['name' => 'administration.users.edit', 'description' => 'Edit existing user', 'is_default' => false],
        ['name' => 'administration.users.index', 'description' => 'Show users', 'is_default' => false],
        ['name' => 'administration.users.show', 'description' => 'Display user information', 'is_default' => true],
        ['name' => 'administration.users.store', 'description' => 'Store newly created user', 'is_default' => false],
        ['name' => 'administration.users.update', 'description' => 'Update edited user', 'is_default' => false],
        ['name' => 'administration.users.destroy', 'description' => 'Delete user', 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Users', 'icon' => 'user', 'route' => 'administration.users.index', 'order_index' => 100, 'has_children' => false,
    ];

    protected $parentMenu = 'Administration';
}
