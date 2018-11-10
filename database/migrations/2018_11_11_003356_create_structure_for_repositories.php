<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForRepositories extends StructureMigration
{
    protected $permissions = [
        ['name' => 'repository.index', 'description' => 'Show index for repository', 'type' => 0, 'is_default' => false],
        ['name' => 'repository.create', 'description' => 'Create repository', 'type' => 1, 'is_default' => false],
        ['name' => 'repository.store', 'description' => 'Store a new repository', 'type' => 1, 'is_default' => false],
        ['name' => 'repository.show', 'description' => 'Show repository', 'type' => 1, 'is_default' => false],
        ['name' => 'repository.edit', 'description' => 'Edit repository', 'type' => 1, 'is_default' => false],
        ['name' => 'repository.update', 'description' => 'Update repository', 'type' => 1, 'is_default' => false],
        ['name' => 'repository.destroy', 'description' => 'Delete repository', 'type' => 1, 'is_default' => false],
        ['name' => 'repository.initTable', 'description' => 'Init table for repository', 'type' => 0, 'is_default' => false],
        ['name' => 'repository.tableData', 'description' => 'Get table data for repository', 'type' => 0, 'is_default' => false],
        ['name' => 'repository.exportExcel', 'description' => 'Export excel for repository', 'type' => 0, 'is_default' => false],
        ['name' => 'repository.options', 'description' => 'Get repository options for select', 'type' => 0, 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Repositories', 'icon' => 'book', 'route' => 'repository.index', 'order_index' => 999, 'has_children' => false
    ];

    protected $parentMenu = '';
}

