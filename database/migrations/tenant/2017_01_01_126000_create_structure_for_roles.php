<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForRoles extends Migration
{
    protected array $permissions = [
        ['name' => 'system.roles.tableData', 'description' => 'Get table data for roles', 'is_default' => false],
        ['name' => 'system.roles.exportExcel', 'description' => 'Export excel for roles', 'is_default' => false],
        ['name' => 'system.roles.initTable', 'description' => 'Init table for roles menu', 'is_default' => false],
        ['name' => 'system.roles.create', 'description' => 'Create role', 'is_default' => false],
        ['name' => 'system.roles.edit', 'description' => 'Edit role', 'is_default' => false],
        ['name' => 'system.roles.configure', 'description' => 'Configure role permissions', 'is_default' => false],
        ['name' => 'system.roles.index', 'description' => 'Show roles index', 'is_default' => false],
        ['name' => 'system.roles.store', 'description' => 'Store newly created role', 'is_default' => false],
        ['name' => 'system.roles.update', 'description' => 'Update role', 'is_default' => false],
        ['name' => 'system.roles.destroy', 'description' => 'Delete role', 'is_default' => false],
        ['name' => 'system.roles.options', 'description' => 'Get options for select', 'is_default' => true],
        ['name' => 'system.roles.permissions.get', 'description' => 'Get role permissions for role configurator', 'is_default' => false],
        ['name' => 'system.roles.permissions.set', 'description' => 'Set role permissions for role configurator', 'is_default' => false],
        ['name' => 'system.roles.permissions.write', 'description' => 'Write role configuration file', 'is_default' => false],
    ];

    protected array $menu = [
        'name' => 'Roles', 'icon' => 'universal-access', 'route' => 'system.roles.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'System';
}
