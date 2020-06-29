<?php

use LaravelEnso\Migrator\App\Database\Migration;

class CreateStructureForPermissions extends Migration
{
    protected $permissions = [
        ['name' => 'system.permissions.index', 'description' => 'Permissions index', 'is_default' => false],
        ['name' => 'system.permissions.create', 'description' => 'Create a new permission', 'is_default' => false],
        ['name' => 'system.permissions.edit', 'description' => 'Edit existing permissions', 'is_default' => false],
        ['name' => 'system.permissions.store', 'description' => 'Save edited permission', 'is_default' => false],
        ['name' => 'system.permissions.update', 'description' => 'Update permission', 'is_default' => false],
        ['name' => 'system.permissions.destroy', 'description' => 'Delete permission', 'is_default' => false],
        ['name' => 'system.permissions.tableData', 'description' => 'Get table data for permissions', 'is_default' => false],
        ['name' => 'system.permissions.exportExcel', 'description' => 'Export excel for permissions', 'is_default' => false],
        ['name' => 'system.permissions.initTable', 'description' => 'Init table data for permissions', 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Permissions', 'icon' => 'exclamation-triangle', 'route' => 'system.permissions.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected $parentMenu = 'System';
}
