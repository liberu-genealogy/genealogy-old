<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForFamilies extends StructureMigration
{
    protected $permissions = [
        ['name' => 'family.index', 'description' => 'Show index for families', 'type' => 0, 'is_default' => false],
        ['name' => 'family.create', 'description' => 'Create families', 'type' => 1, 'is_default' => false],
        ['name' => 'family.store', 'description' => 'Store a new families', 'type' => 1, 'is_default' => false],
        ['name' => 'family.show', 'description' => 'Show families', 'type' => 1, 'is_default' => false],
        ['name' => 'family.edit', 'description' => 'Edit families', 'type' => 1, 'is_default' => false],
        ['name' => 'family.update', 'description' => 'Update families', 'type' => 1, 'is_default' => false],
        ['name' => 'family.destroy', 'description' => 'Delete families', 'type' => 1, 'is_default' => false],
        ['name' => 'family.initTable', 'description' => 'Init table for families', 'type' => 0, 'is_default' => false],
        ['name' => 'family.tableData', 'description' => 'Get table data for families', 'type' => 0, 'is_default' => false],
        ['name' => 'family.exportExcel', 'description' => 'Export excel for families', 'type' => 0, 'is_default' => false],
        ['name' => 'family.options', 'description' => 'Get families options for select', 'type' => 0, 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Families', 'icon' => 'book', 'route' => 'family.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected $parentMenu = '';
}
