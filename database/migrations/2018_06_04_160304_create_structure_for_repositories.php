<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForRepositories extends StructureMigration
{
    protected $permissions = [
        ['name' => 'repositories.index', 'description' => 'repositories index', 'type' => 0, 'is_default' => false],
        ['name' => 'repositories.create', 'description' => 'Get create form  for repositories', 'type' => 0, 'is_default' => false],
        ['name' => 'repositories.edit', 'description' => 'Get edit form for repositories', 'type' => 0, 'is_default' => false],
        ['name' => 'repositories.update', 'description' => 'Update edited repositories', 'type' => 1, 'is_default' => false],
        ['name' => 'repositories.store', 'description' => 'Store newly created repositories', 'type' => 1, 'is_default' => false],
        ['name' => 'repositories.destroy', 'description' => 'Delete repositories', 'type' => 1, 'is_default' => false],
        ['name' => 'repositories.initTable', 'description' => 'Init table for repositories', 'type' => 0, 'is_default' => false],
        ['name' => 'repositories.getTableData', 'description' => 'Get table data for repositories', 'type' => 0, 'is_default' => false],
        ['name' => 'repositories.exportExcel', 'description' => 'Export excel for repositories', 'type' => 0, 'is_default' => false],
        ['name' => 'repositories.selectOptions', 'description' => 'Get repositories list for vue select', 'type' => 0, 'is_default' => false],
        ['name' => 'repositories.show', 'description' => 'Show repositories', 'type' => 0, 'is_default' => false],
    ];

    protected $permissionGroup = [
        'name' => 'repositories', 'description' => 'Repositories group',
    ];

    protected $menu = [
        'name' => 'Repositories', 'icon' => 'tachometer-alt', 'link' => 'repositories.index', 'order_index' => 999, 'has_children' => false,
    ];
}
