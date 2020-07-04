<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForSubms extends Migration
{
    protected array $permissions = [
        ['name' => 'subm.index', 'description' => 'Show index for subms', 'is_default' => false],

        ['name' => 'subm.create', 'description' => 'Create subm', 'is_default' => false],
        ['name' => 'subm.store', 'description' => 'Store a new subm', 'is_default' => false],
        ['name' => 'subm.show', 'description' => 'Show subm', 'is_default' => false],
        ['name' => 'subm.edit', 'description' => 'Edit subm', 'is_default' => false],
        ['name' => 'subm.update', 'description' => 'Update subm', 'is_default' => false],
        ['name' => 'subm.destroy', 'description' => 'Delete subm', 'is_default' => false],
        ['name' => 'subm.initTable', 'description' => 'Init table for subms', 'is_default' => false],

        ['name' => 'subm.tableData', 'description' => 'Get table data for subms', 'is_default' => false],

        ['name' => 'subm.exportExcel', 'description' => 'Export excel for subms', 'is_default' => false],

        ['name' => 'subm.options', 'description' => 'Get subm options for select', 'is_default' => false],
    ];

    protected array $menu = [
        'name' => 'Subm', 'icon' => 'book', 'route' => 'subm.index', 'order_index' => 999, 'has_children' => false
    ];

    protected ?string $parentMenu = 'Information';
}
