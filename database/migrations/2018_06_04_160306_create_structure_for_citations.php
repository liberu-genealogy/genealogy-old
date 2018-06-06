<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForCitations extends StructureMigration
{
    protected $permissions = [
        ['name' => 'citations.index', 'description' => 'citations index', 'type' => 0, 'is_default' => false],
        ['name' => 'citations.create', 'description' => 'Get create form  for citations', 'type' => 0, 'is_default' => false],
        ['name' => 'citations.edit', 'description' => 'Get edit form for citations', 'type' => 0, 'is_default' => false],
        ['name' => 'citations.update', 'description' => 'Update edited citation', 'type' => 1, 'is_default' => false],
        ['name' => 'citations.store', 'description' => 'Store newly created citation', 'type' => 1, 'is_default' => false],
        ['name' => 'citations.destroy', 'description' => 'Delete citation', 'type' => 1, 'is_default' => false],
        ['name' => 'citations.initTable', 'description' => 'Init table for citations', 'type' => 0, 'is_default' => false],
        ['name' => 'citations.getTableData', 'description' => 'Get table data for citations', 'type' => 0, 'is_default' => false],
        ['name' => 'citations.exportExcel', 'description' => 'Export excel for citations', 'type' => 0, 'is_default' => false],
        ['name' => 'citations.selectOptions', 'description' => 'Get citation list for vue select', 'type' => 0, 'is_default' => false],
        ['name' => 'citations.show', 'description' => 'Show citation', 'type' => 0, 'is_default' => false],
    ];

    protected $permissionGroup = [
        'name' => 'citations', 'description' => 'Citations group',
    ];

    protected $menu = [
        'name' => 'Citations', 'icon' => 'tachometer-alt', 'link' => 'citations.index', 'order_index' => 999, 'has_children' => false,
    ];
}
