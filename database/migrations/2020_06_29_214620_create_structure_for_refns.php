<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForRefns extends Migration
{
    protected array $permissions = [
        ['name' => 'refn.index', 'description' => 'Show index for refns', 'is_default' => false],

        ['name' => 'refn.create', 'description' => 'Create refn', 'is_default' => false],
        ['name' => 'refn.store', 'description' => 'Store a new refn', 'is_default' => false],
        ['name' => 'refn.show', 'description' => 'Show refn', 'is_default' => false],
        ['name' => 'refn.edit', 'description' => 'Edit refn', 'is_default' => false],
        ['name' => 'refn.update', 'description' => 'Update refn', 'is_default' => false],
        ['name' => 'refn.destroy', 'description' => 'Delete refn', 'is_default' => false],
        ['name' => 'refn.initTable', 'description' => 'Init table for refns', 'is_default' => false],

        ['name' => 'refn.tableData', 'description' => 'Get table data for refns', 'is_default' => false],

        ['name' => 'refn.exportExcel', 'description' => 'Export excel for refns', 'is_default' => false],

        ['name' => 'refn.options', 'description' => 'Get refn options for select', 'is_default' => false],
    ];

    protected array $menu = [
        'name' => 'Refn', 'icon' => 'book', 'route' => 'refn.index', 'order_index' => 999, 'has_children' => false
    ];

    protected ?string $parentMenu = 'Information';
}

