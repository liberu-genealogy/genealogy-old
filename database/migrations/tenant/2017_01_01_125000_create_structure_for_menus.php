<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForMenus extends Migration
{
    protected $permissions = [
        ['name' => 'system.menus.index', 'description' => 'Menus index', 'is_default' => false],
        ['name' => 'system.menus.tableData', 'description' => 'Get table data for menus', 'is_default' => false],
        ['name' => 'system.menus.exportExcel', 'description' => 'Export excel for menus', 'is_default' => false],
        ['name' => 'system.menus.initTable', 'description' => 'Init table for menus menu', 'is_default' => false],
        ['name' => 'system.menus.create', 'description' => 'Create menu', 'is_default' => false],
        ['name' => 'system.menus.edit', 'description' => 'Edit menu', 'is_default' => false],
        ['name' => 'system.menus.store', 'description' => 'Store newly created menu', 'is_default' => false],
        ['name' => 'system.menus.update', 'description' => 'Update edited menu', 'is_default' => false],
        ['name' => 'system.menus.destroy', 'description' => 'Delete menu', 'is_default' => false],
        ['name' => 'system.menus.organize', 'description' => 'Organize menus', 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Menus', 'icon' => 'list', 'route' => 'system.menus.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected $parentMenu = 'System';
}
