<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForIndividuals extends StructureMigration
{
    protected $permissions = [
        ['name' => 'individuals.index', 'description' => 'Work Orders index', 'type' => 0, 'is_default' => false],
        ['name' => 'individuals.create', 'description' => 'Get create form  for Work Orders', 'type' => 0, 'is_default' => false],
        ['name' => 'individuals.edit', 'description' => 'Get edit form for individuals', 'type' => 0, 'is_default' => false],
        ['name' => 'individuals.update', 'description' => 'Update edited event', 'type' => 1, 'is_default' => false],
        ['name' => 'individuals.store', 'description' => 'Store newly created event', 'type' => 1, 'is_default' => false],
        ['name' => 'individuals.destroy', 'description' => 'Delete event', 'type' => 1, 'is_default' => false],
        ['name' => 'individuals.initTable', 'description' => 'Init table for individuals', 'type' => 0, 'is_default' => false],
        ['name' => 'individuals.getTableData', 'description' => 'Get table data for individuals', 'type' => 0, 'is_default' => false],
        ['name' => 'individuals.exportExcel', 'description' => 'Export excel for individuals', 'type' => 0, 'is_default' => false],
        ['name' => 'individuals.selectOptions', 'description' => 'Get work order_indexs list for vue select', 'type' => 0, 'is_default' => false],
    ];

    protected $permissionGroup = [
        'name' => 'individuals', 'description' => 'Individuals group',
    ];

    protected $menu = [
        'name' => 'Individuals', 'icon' => 'tasks', 'link' => 'individuals.index', 'order_index' => 999, 'has_children' => false,
    ];
}
