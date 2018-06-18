<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForTrees extends StructureMigration
{
    protected $permissions = [
        ['name' => 'trees.index', 'description' => 'trees index', 'type' => 0, 'is_default' => false],
        ['name' => 'trees.create', 'description' => 'Get create form  for trees', 'type' => 0, 'is_default' => false],
        ['name' => 'trees.edit', 'description' => 'Get edit form for trees', 'type' => 0, 'is_default' => false],
        ['name' => 'trees.update', 'description' => 'Update edited tree', 'type' => 1, 'is_default' => false],
        ['name' => 'trees.store', 'description' => 'Store newly created tree', 'type' => 1, 'is_default' => false],
        ['name' => 'trees.destroy', 'description' => 'Delete tree', 'type' => 1, 'is_default' => false],
        ['name' => 'trees.initTable', 'description' => 'Init table for trees', 'type' => 0, 'is_default' => false],
        ['name' => 'trees.getTableData', 'description' => 'Get table data for trees', 'type' => 0, 'is_default' => false],
        ['name' => 'trees.exportExcel', 'description' => 'Export excel for trees', 'type' => 0, 'is_default' => false],
        ['name' => 'trees.selectOptions', 'description' => 'Get tree list for vue select', 'type' => 0, 'is_default' => false],
        ['name' => 'trees.links', 'description' => 'Lists connections', 'type' => 0, 'is_default' => false],
    ];

    protected $permissionGroup = [
        'name' => 'trees', 'description' => 'Trees group',
    ];

    protected $menu = [
        'name' => 'Network', 'icon' => 'tachometer-alt', 'link' => 'trees.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected $parentMenu = 'Trees';
}
