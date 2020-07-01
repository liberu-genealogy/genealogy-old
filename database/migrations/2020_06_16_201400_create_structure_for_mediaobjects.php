<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForMediaObjects extends Migration
{
    protected $permissions = [
        ['name' => 'objects.index', 'description' => 'Show index for objects', 'is_default' => false],

        ['name' => 'objects.create', 'description' => 'Create object', 'is_default' => false],
        ['name' => 'objects.store', 'description' => 'Store a new object', 'is_default' => false],
        ['name' => 'objects.show', 'description' => 'Show object', 'is_default' => false],
        ['name' => 'objects.edit', 'description' => 'Edit object', 'is_default' => false],
        ['name' => 'objects.update', 'description' => 'Update object', 'is_default' => false],
        ['name' => 'objects.destroy', 'description' => 'Delete object', 'is_default' => false],
        ['name' => 'objects.initTable', 'description' => 'Init table for objects', 'is_default' => false],

        ['name' => 'objects.tableData', 'description' => 'Get table data for objects', 'is_default' => false],

        ['name' => 'objects.exportExcel', 'description' => 'Export excel for objects', 'is_default' => false],

        ['name' => 'objects.options', 'description' => 'Get object options for select', 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Objects', 'icon' => 'book', 'route' => 'objects.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected $parentMenu = 'Information';
}
