<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForCitations extends StructureMigration
{
    protected $permissions = [
        ['name' => 'citations.index', 'description' => 'Show index for citation', 'type' => 0, 'is_default' => false],
        ['name' => 'citations.create', 'description' => 'Create citation', 'type' => 1, 'is_default' => false],
        ['name' => 'citations.store', 'description' => 'Store a new citation', 'type' => 1, 'is_default' => false],
        ['name' => 'citations.show', 'description' => 'Show citation', 'type' => 1, 'is_default' => false],
        ['name' => 'citations.edit', 'description' => 'Edit citation', 'type' => 1, 'is_default' => false],
        ['name' => 'citations.update', 'description' => 'Update citation', 'type' => 1, 'is_default' => false],
        ['name' => 'citations.destroy', 'description' => 'Delete citation', 'type' => 1, 'is_default' => false],
        ['name' => 'citations.initTable', 'description' => 'Init table for citation', 'type' => 0, 'is_default' => false],
        ['name' => 'citations.tableData', 'description' => 'Get table data for citation', 'type' => 0, 'is_default' => false],
        ['name' => 'citations.exportExcel', 'description' => 'Export excel for citation', 'type' => 0, 'is_default' => false],
        ['name' => 'citations.options', 'description' => 'Get citation options for select', 'type' => 0, 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Citation', 'icon' => 'fa-book', 'route' => 'citations.index', 'order_index' => 999, 'has_children' => false
    ];

    protected $parentMenu = '';
}

