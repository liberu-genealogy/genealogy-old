<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForIndividuals extends StructureMigration
{
    protected $permissions = [
        ['name' => 'individuals.index', 'description' => 'Individuals index', 'type' => 0, 'is_default' => true],
        ['name' => 'individuals.create', 'description' => 'Get create form  for Work Orders', 'type' => 0, 'is_default' => true],
        ['name' => 'individuals.edit', 'description' => 'Get edit form for individuals', 'type' => 0, 'is_default' => true],
        ['name' => 'individuals.update', 'description' => 'Update edited event', 'type' => 1, 'is_default' => true],
        ['name' => 'individuals.store', 'description' => 'Store newly created event', 'type' => 1, 'is_default' => true],
        ['name' => 'individuals.destroy', 'description' => 'Delete event', 'type' => 1, 'is_default' => true],
        ['name' => 'individuals.initTable', 'description' => 'Init table for individuals', 'type' => 0, 'is_default' => true],
        ['name' => 'individuals.getTableData', 'description' => 'Get table data for individuals', 'type' => 0, 'is_default' => true],
        ['name' => 'individuals.exportExcel', 'description' => 'Export excel for individuals', 'type' => 0, 'is_default' => true],
        ['name' => 'individuals.selectOptions', 'description' => 'Get individuals list for vue select', 'type' => 0, 'is_default' => true],
    ];

    protected $permissionGroup = [
        'name' => 'individuals', 'description' => 'Individuals group',
    ];

    protected $menu = [
        'name' => 'Individuals', 'icon' => 'tasks', 'link' => 'individuals.index', 'order_index' => 999, 'has_children' => false,
    ];
}
