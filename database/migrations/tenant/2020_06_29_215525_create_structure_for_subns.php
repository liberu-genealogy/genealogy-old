<?php

use LaravelEnso\Migrator\App\Database\Migration;

class CreateStructureForSubns extends Migration
{
    protected $permissions = [
        ['name' => 'subn.index', 'description' => 'Show index for subns', 'is_default' => false],

        ['name' => 'subn.create', 'description' => 'Create subn', 'is_default' => false],
        ['name' => 'subn.store', 'description' => 'Store a new subn', 'is_default' => false],
        ['name' => 'subn.show', 'description' => 'Show subn', 'is_default' => false],
        ['name' => 'subn.edit', 'description' => 'Edit subn', 'is_default' => false],
        ['name' => 'subn.update', 'description' => 'Update subn', 'is_default' => false],
        ['name' => 'subn.destroy', 'description' => 'Delete subn', 'is_default' => false],
        ['name' => 'subn.initTable', 'description' => 'Init table for subns', 'is_default' => false],

        ['name' => 'subn.tableData', 'description' => 'Get table data for subns', 'is_default' => false],

        ['name' => 'subn.exportExcel', 'description' => 'Export excel for subns', 'is_default' => false],

        ['name' => 'subn.options', 'description' => 'Get subn options for select', 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Subn', 'icon' => 'book', 'route' => 'subn.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected $parentMenu = 'Information';
}
