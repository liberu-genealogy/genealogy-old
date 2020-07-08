<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForMediaObjects extends Migration
{
    protected array $permissions = [
        ['name' => 'objects.index', 'description' => 'Show index for objects', 'is_default' => true],

        ['name' => 'objects.create', 'description' => 'Create object', 'is_default' => true],
        ['name' => 'objects.store', 'description' => 'Store a new object', 'is_default' => true],
        ['name' => 'objects.show', 'description' => 'Show object', 'is_default' => true],
        ['name' => 'objects.edit', 'description' => 'Edit object', 'is_default' => true],
        ['name' => 'objects.update', 'description' => 'Update object', 'is_default' => true],
        ['name' => 'objects.destroy', 'description' => 'Delete object', 'is_default' => true],
        ['name' => 'objects.initTable', 'description' => 'Init table for objects', 'is_default' => true],

        ['name' => 'objects.tableData', 'description' => 'Get table data for objects', 'is_default' => true],

        ['name' => 'objects.exportExcel', 'description' => 'Export excel for objects', 'is_default' => true],

        ['name' => 'objects.options', 'description' => 'Get object options for select', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Objects', 'icon' => 'book', 'route' => 'objects.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'Information';
}
