<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForTypes extends Migration
{
    protected $permissions = [
        ['name' => 'types.index', 'description' => 'Show index for types', 'is_default' => false],

        ['name' => 'types.create', 'description' => 'Create type', 'is_default' => false],
        ['name' => 'types.store', 'description' => 'Store a new type', 'is_default' => false],
        ['name' => 'types.show', 'description' => 'Show type', 'is_default' => false],
        ['name' => 'types.edit', 'description' => 'Edit type', 'is_default' => false],
        ['name' => 'types.update', 'description' => 'Update type', 'is_default' => false],
        ['name' => 'types.destroy', 'description' => 'Delete type', 'is_default' => false],
        ['name' => 'types.initTable', 'description' => 'Init table for types', 'is_default' => false],

        ['name' => 'types.tableData', 'description' => 'Get table data for types', 'is_default' => false],

        ['name' => 'types.exportExcel', 'description' => 'Export excel for types', 'is_default' => false],

        ['name' => 'types.options', 'description' => 'Get type options for select', 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Types', 'icon' => 'users', 'route' => 'types.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected $parentMenu = 'References';
}
