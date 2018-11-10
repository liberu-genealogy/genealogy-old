<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForRelationships extends StructureMigration
{
    protected $permissions = [
        ['name' => 'relationship.index', 'description' => 'Show index for relationship', 'type' => 0, 'is_default' => false],
        ['name' => 'relationship.create', 'description' => 'Create relationship', 'type' => 1, 'is_default' => false],
        ['name' => 'relationship.store', 'description' => 'Store a new relationship', 'type' => 1, 'is_default' => false],
        ['name' => 'relationship.show', 'description' => 'Show relationship', 'type' => 1, 'is_default' => false],
        ['name' => 'relationship.edit', 'description' => 'Edit relationship', 'type' => 1, 'is_default' => false],
        ['name' => 'relationship.update', 'description' => 'Update relationship', 'type' => 1, 'is_default' => false],
        ['name' => 'relationship.destroy', 'description' => 'Delete relationship', 'type' => 1, 'is_default' => false],
        ['name' => 'relationship.initTable', 'description' => 'Init table for relationship', 'type' => 0, 'is_default' => false],
        ['name' => 'relationship.tableData', 'description' => 'Get table data for relationship', 'type' => 0, 'is_default' => false],
        ['name' => 'relationship.exportExcel', 'description' => 'Export excel for relationship', 'type' => 0, 'is_default' => false],
        ['name' => 'relationship.options', 'description' => 'Get relationship options for select', 'type' => 0, 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Relationships', 'icon' => 'book', 'route' => 'relationship.index', 'order_index' => 999, 'has_children' => false
    ];

    protected $parentMenu = '';
}

