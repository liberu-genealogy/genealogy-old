<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForRelationships extends StructureMigration
{
    protected $permissions = [
        ['name' => 'relationship.index', 'description' => 'Show index for relationships', 'type' => 0, 'is_default' => false],
        ['name' => 'relationship.create', 'description' => 'Create relationships', 'type' => 1, 'is_default' => false],
        ['name' => 'relationship.store', 'description' => 'Store a new relationships', 'type' => 1, 'is_default' => false],
        ['name' => 'relationship.show', 'description' => 'Show relationships', 'type' => 1, 'is_default' => false],
        ['name' => 'relationship.edit', 'description' => 'Edit relationships', 'type' => 1, 'is_default' => false],
        ['name' => 'relationship.update', 'description' => 'Update relationships', 'type' => 1, 'is_default' => false],
        ['name' => 'relationship.destroy', 'description' => 'Delete relationships', 'type' => 1, 'is_default' => false],
        ['name' => 'relationship.initTable', 'description' => 'Init table for relationships', 'type' => 0, 'is_default' => false],
        ['name' => 'relationship.tableData', 'description' => 'Get table data for relationships', 'type' => 0, 'is_default' => false],
        ['name' => 'relationship.exportExcel', 'description' => 'Export excel for relationships', 'type' => 0, 'is_default' => false],
        ['name' => 'relationship.options', 'description' => 'Get relationships options for select', 'type' => 0, 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Relationships', 'icon' => 'book', 'route' => 'relationship.index', 'order_index' => 999, 'has_children' => false
    ];

    protected $parentMenu = '';
}

