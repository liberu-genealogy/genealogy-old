<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForSubms extends Migration
{
    protected array $permissions = [
        ['name' => 'subm.index', 'description' => 'Show index for subms', 'is_default' => true],

        ['name' => 'subm.create', 'description' => 'Create subm', 'is_default' => true],
        ['name' => 'subm.store', 'description' => 'Store a new subm', 'is_default' => true],
        ['name' => 'subm.show', 'description' => 'Show subm', 'is_default' => true],
        ['name' => 'subm.edit', 'description' => 'Edit subm', 'is_default' => true],
        ['name' => 'subm.update', 'description' => 'Update subm', 'is_default' => true],
        ['name' => 'subm.destroy', 'description' => 'Delete subm', 'is_default' => true],
        ['name' => 'subm.initTable', 'description' => 'Init table for subms', 'is_default' => true],

        ['name' => 'subm.tableData', 'description' => 'Get table data for subms', 'is_default' => true],

        ['name' => 'subm.exportExcel', 'description' => 'Export excel for subms', 'is_default' => true],

        ['name' => 'subm.options', 'description' => 'Get subm options for select', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Subm', 'icon' => 'book', 'route' => 'subm.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'Information';
}
