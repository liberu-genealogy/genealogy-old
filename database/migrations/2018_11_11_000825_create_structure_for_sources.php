<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForSources extends StructureMigration
{
    protected $permissions = [
        ['name' => 'sources.index', 'description' => 'Show index for source', 'type' => 0, 'is_default' => false],
        ['name' => 'sources.create', 'description' => 'Create source', 'type' => 1, 'is_default' => false],
        ['name' => 'sources.store', 'description' => 'Store a new source', 'type' => 1, 'is_default' => false],
        ['name' => 'sources.show', 'description' => 'Show source', 'type' => 1, 'is_default' => false],
        ['name' => 'sources.edit', 'description' => 'Edit source', 'type' => 1, 'is_default' => false],
        ['name' => 'sources.update', 'description' => 'Update source', 'type' => 1, 'is_default' => false],
        ['name' => 'sources.destroy', 'description' => 'Delete source', 'type' => 1, 'is_default' => false],
        ['name' => 'sources.initTable', 'description' => 'Init table for source', 'type' => 0, 'is_default' => false],
        ['name' => 'sources.tableData', 'description' => 'Get table data for source', 'type' => 0, 'is_default' => false],
        ['name' => 'sources.exportExcel', 'description' => 'Export excel for source', 'type' => 0, 'is_default' => false],
        ['name' => 'sources.options', 'description' => 'Get source options for select', 'type' => 0, 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Sources', 'icon' => 'book', 'route' => 'sources.index', 'order_index' => 999, 'has_children' => false
    ];

    protected $parentMenu = '';
}

