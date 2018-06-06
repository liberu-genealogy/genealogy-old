<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForFamilies extends StructureMigration
{
    protected $permissions = [
        ['name' => 'families.index', 'description' => 'families index', 'type' => 0, 'is_default' => false],
        ['name' => 'families.create', 'description' => 'Get create form  for families', 'type' => 0, 'is_default' => false],
        ['name' => 'families.edit', 'description' => 'Get edit form for families', 'type' => 0, 'is_default' => false],
        ['name' => 'families.update', 'description' => 'Update edited event', 'type' => 1, 'is_default' => false],
        ['name' => 'families.store', 'description' => 'Store newly created event', 'type' => 1, 'is_default' => false],
        ['name' => 'families.destroy', 'description' => 'Delete event', 'type' => 1, 'is_default' => false],
        ['name' => 'families.initTable', 'description' => 'Init table for families', 'type' => 0, 'is_default' => false],
        ['name' => 'families.getTableData', 'description' => 'Get table data for families', 'type' => 0, 'is_default' => false],
        ['name' => 'families.exportExcel', 'description' => 'Export excel for families', 'type' => 0, 'is_default' => false],
        ['name' => 'families.selectOptions', 'description' => 'Get family list for vue select', 'type' => 0, 'is_default' => false],
        ['name' => 'families.show', 'description' => 'Show family', 'type' => 0, 'is_default' => false],
    ];

    protected $permissionGroup = [
        'name' => 'families', 'description' => 'Families group',
    ];

    protected $menu = [
        'name' => 'Families', 'icon' => 'tachometer-alt', 'link' => 'families.index', 'order_index' => 999, 'has_children' => false,
    ];
}
