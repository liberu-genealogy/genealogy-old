<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForCitations extends StructureMigration
{
    protected $permissions = [
        ['name' => 'citation.index', 'description' => 'Show index for citation', 'type' => 0, 'is_default' => false],
        ['name' => 'citation.create', 'description' => 'Create citation', 'type' => 1, 'is_default' => false],
        ['name' => 'citation.store', 'description' => 'Store a new citation', 'type' => 1, 'is_default' => false],
        ['name' => 'citation.show', 'description' => 'Show citation', 'type' => 1, 'is_default' => false],
        ['name' => 'citation.edit', 'description' => 'Edit citation', 'type' => 1, 'is_default' => false],
        ['name' => 'citation.update', 'description' => 'Update citation', 'type' => 1, 'is_default' => false],
        ['name' => 'citation.destroy', 'description' => 'Delete citation', 'type' => 1, 'is_default' => false],
        ['name' => 'citation.initTable', 'description' => 'Init table for citation', 'type' => 0, 'is_default' => false],
        ['name' => 'citation.tableData', 'description' => 'Get table data for citation', 'type' => 0, 'is_default' => false],
        ['name' => 'citation.exportExcel', 'description' => 'Export excel for citation', 'type' => 0, 'is_default' => false],
        ['name' => 'citation.options', 'description' => 'Get citation options for select', 'type' => 0, 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Citations', 'icon' => 'book', 'route' => 'citation.index', 'order_index' => 999, 'has_children' => false
    ];

    protected $parentMenu = '';
}

