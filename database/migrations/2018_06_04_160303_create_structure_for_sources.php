<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForSources extends StructureMigration
{
    protected $permissions = [
        ['name' => 'sources.index', 'description' => 'Sources index', 'type' => 0, 'is_default' => false],
        ['name' => 'sources.create', 'description' => 'Get create form  for sources', 'type' => 0, 'is_default' => false],
        ['name' => 'sources.edit', 'description' => 'Get edit form for sources', 'type' => 0, 'is_default' => false],
        ['name' => 'sources.update', 'description' => 'Update edited source', 'type' => 1, 'is_default' => false],
        ['name' => 'sources.store', 'description' => 'Store newly created source', 'type' => 1, 'is_default' => false],
        ['name' => 'sources.destroy', 'description' => 'Delete source', 'type' => 1, 'is_default' => false],
        ['name' => 'sources.initTable', 'description' => 'Init table for sources', 'type' => 0, 'is_default' => false],
        ['name' => 'sources.getTableData', 'description' => 'Get table data for sources', 'type' => 0, 'is_default' => false],
        ['name' => 'sources.exportExcel', 'description' => 'Export excel for sources', 'type' => 0, 'is_default' => false],
        ['name' => 'sources.selectOptions', 'description' => 'Get source list for vue select', 'type' => 0, 'is_default' => false],
        ['name' => 'sources.show', 'description' => 'Show source', 'type' => 0, 'is_default' => false],
    ];

    protected $permissionGroup = [
        'name' => 'sources', 'description' => 'Sources group',
    ];

    protected $menu = [
        'name' => 'Sources', 'icon' => 'tachometer-alt', 'link' => 'sources.index', 'order_index' => 999, 'has_children' => false,
    ];
}
