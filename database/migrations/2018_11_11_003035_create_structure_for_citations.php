<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForCitations extends StructureMigration
{
    protected $permissions = [
        ['name' => 'citation.index', 'description' => 'Show index for citations', 'type' => 0, 'is_default' => false],
        ['name' => 'citation.create', 'description' => 'Create citations', 'type' => 1, 'is_default' => false],
        ['name' => 'citation.store', 'description' => 'Store a new citations', 'type' => 1, 'is_default' => false],
        ['name' => 'citation.show', 'description' => 'Show citations', 'type' => 1, 'is_default' => false],
        ['name' => 'citation.edit', 'description' => 'Edit citations', 'type' => 1, 'is_default' => false],
        ['name' => 'citation.update', 'description' => 'Update citations', 'type' => 1, 'is_default' => false],
        ['name' => 'citation.destroy', 'description' => 'Delete citations', 'type' => 1, 'is_default' => false],
        ['name' => 'citation.initTable', 'description' => 'Init table for citations', 'type' => 0, 'is_default' => false],
        ['name' => 'citation.tableData', 'description' => 'Get table data for citations', 'type' => 0, 'is_default' => false],
        ['name' => 'citation.exportExcel', 'description' => 'Export excel for citations', 'type' => 0, 'is_default' => false],
        ['name' => 'citation.options', 'description' => 'Get citations options for select', 'type' => 0, 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Citations', 'icon' => 'book', 'route' => 'citation.index', 'order_index' => 999, 'has_children' => false
    ];

    protected $parentMenu = '';
}

