<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForCitations extends StructureMigration
{
    protected $permissions = [
        ['name' => 'citations.index', 'description' => 'Show index for citations', 'type' => 0, 'is_default' => false],
        ['name' => 'citations.create', 'description' => 'Create citations', 'type' => 1, 'is_default' => false],
        ['name' => 'citations.store', 'description' => 'Store a new citations', 'type' => 1, 'is_default' => false],
        ['name' => 'citations.show', 'description' => 'Show citations', 'type' => 1, 'is_default' => false],
        ['name' => 'citations.edit', 'description' => 'Edit citations', 'type' => 1, 'is_default' => false],
        ['name' => 'citations.update', 'description' => 'Update citations', 'type' => 1, 'is_default' => false],
        ['name' => 'citations.destroy', 'description' => 'Delete citations', 'type' => 1, 'is_default' => false],
        ['name' => 'citations.initTable', 'description' => 'Init table for citations', 'type' => 0, 'is_default' => false],
        ['name' => 'citations.tableData', 'description' => 'Get table data for citations', 'type' => 0, 'is_default' => false],
        ['name' => 'citations.exportExcel', 'description' => 'Export excel for citations', 'type' => 0, 'is_default' => false],
        ['name' => 'citations.options', 'description' => 'Get citations options for select', 'type' => 0, 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Citation', 'icon' => 'fa-book', 'route' => 'citations.index', 'order_index' => 999, 'has_children' => false
    ];

    protected $parentMenu = '';
}

