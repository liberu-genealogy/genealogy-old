<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForFamilies extends StructureMigration
{
    protected $permissions = [
        ['name' => 'family.index', 'description' => 'Show index for family', 'type' => 0, 'is_default' => false],
        ['name' => 'family.create', 'description' => 'Create family', 'type' => 1, 'is_default' => false],
        ['name' => 'family.store', 'description' => 'Store a new family', 'type' => 1, 'is_default' => false],
        ['name' => 'family.show', 'description' => 'Show family', 'type' => 1, 'is_default' => false],
        ['name' => 'family.edit', 'description' => 'Edit family', 'type' => 1, 'is_default' => false],
        ['name' => 'family.update', 'description' => 'Update family', 'type' => 1, 'is_default' => false],
        ['name' => 'family.destroy', 'description' => 'Delete family', 'type' => 1, 'is_default' => false],
        ['name' => 'family.initTable', 'description' => 'Init table for family', 'type' => 0, 'is_default' => false],
        ['name' => 'family.tableData', 'description' => 'Get table data for family', 'type' => 0, 'is_default' => false],
        ['name' => 'family.exportExcel', 'description' => 'Export excel for family', 'type' => 0, 'is_default' => false],
        ['name' => 'family.options', 'description' => 'Get family options for select', 'type' => 0, 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Family', 'icon' => 'fa-book', 'route' => 'family.index', 'order_index' => 999, 'has_children' => false
    ];

    protected $parentMenu = '';
}

