<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForRepositories extends Migration
{
    protected array $permissions = [
        ['name' => 'repositories.index', 'description' => 'Show index for repositories', 'is_default' => true],

        ['name' => 'repositories.create', 'description' => 'Create repository', 'is_default' => true],
        ['name' => 'repositories.store', 'description' => 'Store a new repository', 'is_default' => true],
        ['name' => 'repositories.show', 'description' => 'Show repository', 'is_default' => true],
        ['name' => 'repositories.edit', 'description' => 'Edit repository', 'is_default' => true],
        ['name' => 'repositories.update', 'description' => 'Update repository', 'is_default' => true],
        ['name' => 'repositories.destroy', 'description' => 'Delete repository', 'is_default' => true],
        ['name' => 'repositories.initTable', 'description' => 'Init table for repositories', 'is_default' => true],

        ['name' => 'repositories.tableData', 'description' => 'Get table data for repositories', 'is_default' => true],

        ['name' => 'repositories.exportExcel', 'description' => 'Export excel for repositories', 'is_default' => true],

        ['name' => 'repositories.options', 'description' => 'Get repository options for select', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Repositories', 'icon' => 'users', 'route' => 'repositories.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'Sources';
}
