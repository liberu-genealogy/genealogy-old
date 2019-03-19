<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForIndividuals extends StructureMigration
{
    protected $permissions = [
        ['name' => 'individual.index', 'description' => 'Show index for individual', 'type' => 0, 'is_default' => false],
        ['name' => 'individual.create', 'description' => 'Create individual', 'type' => 1, 'is_default' => false],
        ['name' => 'individual.store', 'description' => 'Store a new individual', 'type' => 1, 'is_default' => false],
        ['name' => 'individual.show', 'description' => 'Show individual', 'type' => 1, 'is_default' => false],
        ['name' => 'individual.edit', 'description' => 'Edit individual', 'type' => 1, 'is_default' => false],
        ['name' => 'individual.update', 'description' => 'Update individual', 'type' => 1, 'is_default' => false],
        ['name' => 'individual.destroy', 'description' => 'Delete individual', 'type' => 1, 'is_default' => false],
        ['name' => 'individual.initTable', 'description' => 'Init table for individual', 'type' => 0, 'is_default' => false],
        ['name' => 'individual.tableData', 'description' => 'Get table data for individual', 'type' => 0, 'is_default' => false],
        ['name' => 'individual.exportExcel', 'description' => 'Export excel for individual', 'type' => 0, 'is_default' => false],
        ['name' => 'individual.options', 'description' => 'Get individual options for select', 'type' => 0, 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Individual', 'icon' => 'fa-book', 'route' => 'individual.index', 'order_index' => 999, 'has_children' => false
    ];

    protected $parentMenu = '';
}

