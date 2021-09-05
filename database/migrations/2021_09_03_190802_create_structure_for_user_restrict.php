<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForUserRestrict extends Migration
{
    protected array $permissions = [
        ['name' => 'administration.userrestrict.initTable', 'description' => 'Init table for userrestrict', 'is_default' => false],
        ['name' => 'administration.userrestrict.tableData', 'description' => 'Get table data for userrestrict', 'is_default' => false],
        ['name' => 'administration.userrestrict.exportExcel', 'description' => 'Export excel for userrestrict', 'is_default' => false],
        ['name' => 'administration.userrestrict.options', 'description' => 'Get options for select', 'is_default' => false],
        ['name' => 'administration.userrestrict.create', 'description' => 'Create user', 'is_default' => false],
        ['name' => 'administration.userrestrict.edit', 'description' => 'Edit existing user', 'is_default' => false],
        ['name' => 'administration.userrestrict.index', 'description' => 'Show userrestrict', 'is_default' => false],
        ['name' => 'administration.userrestrict.show', 'description' => 'Display user information', 'is_default' => true],
        ['name' => 'administration.userrestrict.store', 'description' => 'Store newly created user', 'is_default' => false],
        ['name' => 'administration.userrestrict.update', 'description' => 'Update edited user', 'is_default' => false],
        ['name' => 'administration.userrestrict.destroy', 'description' => 'Delete user', 'is_default' => false],
    ];

    protected array $menu = [
        'name' => 'User Restrict', 'icon' => 'user', 'route' => 'administration.userrestrict.index', 'order_index' => 100, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'Administration';
}
