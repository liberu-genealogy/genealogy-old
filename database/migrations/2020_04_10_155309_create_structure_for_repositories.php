<?php

use LaravelEnso\Migrator\App\Database\Migration;

class CreateStructureForRepositories extends Migration
{
    protected $permissions = [
        ['name' => 'repositories.index', 'description' => 'Show index for repositories', 'is_default' => false],

        ['name' => 'repositories.create', 'description' => 'Create repository', 'is_default' => false],
        ['name' => 'repositories.store', 'description' => 'Store a new repository', 'is_default' => false],
        ['name' => 'repositories.show', 'description' => 'Show repository', 'is_default' => false],
        ['name' => 'repositories.edit', 'description' => 'Edit repository', 'is_default' => false],
        ['name' => 'repositories.update', 'description' => 'Update repository', 'is_default' => false],
        ['name' => 'repositories.destroy', 'description' => 'Delete repository', 'is_default' => false],
        ['name' => 'repositories.initTable', 'description' => 'Init table for repositories', 'is_default' => false],

        ['name' => 'repositories.tableData', 'description' => 'Get table data for repositories', 'is_default' => false],

        ['name' => 'repositories.exportExcel', 'description' => 'Export excel for repositories', 'is_default' => false],

        ['name' => 'repositories.options', 'description' => 'Get repository options for select', 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Repositories', 'icon' => '', 'route' => 'repositories.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected $parentMenu = '';
}
