<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForRepositories extends StructureMigration
{
    protected $permissions = [
        ['name' => 'repository.index', 'description' => 'Show index for repositories', 'type' => 0, 'is_default' => false],
        ['name' => 'repository.create', 'description' => 'Create repositories', 'type' => 1, 'is_default' => false],
        ['name' => 'repository.store', 'description' => 'Store a new repositories', 'type' => 1, 'is_default' => false],
        ['name' => 'repository.show', 'description' => 'Show repositories', 'type' => 1, 'is_default' => false],
        ['name' => 'repository.edit', 'description' => 'Edit repositories', 'type' => 1, 'is_default' => false],
        ['name' => 'repository.update', 'description' => 'Update repositories', 'type' => 1, 'is_default' => false],
        ['name' => 'repository.destroy', 'description' => 'Delete repositories', 'type' => 1, 'is_default' => false],
        ['name' => 'repository.initTable', 'description' => 'Init table for repositories', 'type' => 0, 'is_default' => false],
        ['name' => 'repository.tableData', 'description' => 'Get table data for repositories', 'type' => 0, 'is_default' => false],
        ['name' => 'repository.exportExcel', 'description' => 'Export excel for repositories', 'type' => 0, 'is_default' => false],
        ['name' => 'repository.options', 'description' => 'Get repositories options for select', 'type' => 0, 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Repositories', 'icon' => 'book', 'route' => 'repository.index', 'order_index' => 999, 'has_children' => false
    ];

    protected $parentMenu = '';
}

