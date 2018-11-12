<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForSources extends StructureMigration
{
    protected $permissions = [
        ['name' => 'source.index', 'description' => 'Show index for source', 'type' => 0, 'is_default' => false],
        ['name' => 'source.create', 'description' => 'Create source', 'type' => 1, 'is_default' => false],
        ['name' => 'source.store', 'description' => 'Store a new source', 'type' => 1, 'is_default' => false],
        ['name' => 'source.show', 'description' => 'Show source', 'type' => 1, 'is_default' => false],
        ['name' => 'source.edit', 'description' => 'Edit source', 'type' => 1, 'is_default' => false],
        ['name' => 'source.update', 'description' => 'Update source', 'type' => 1, 'is_default' => false],
        ['name' => 'source.destroy', 'description' => 'Delete source', 'type' => 1, 'is_default' => false],
        ['name' => 'source.initTable', 'description' => 'Init table for source', 'type' => 0, 'is_default' => false],
        ['name' => 'source.tableData', 'description' => 'Get table data for source', 'type' => 0, 'is_default' => false],
        ['name' => 'source.exportExcel', 'description' => 'Export excel for source', 'type' => 0, 'is_default' => false],
        ['name' => 'source.options', 'description' => 'Get source options for select', 'type' => 0, 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Sources', 'icon' => 'book', 'route' => 'source.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected $parentMenu = '';
}
