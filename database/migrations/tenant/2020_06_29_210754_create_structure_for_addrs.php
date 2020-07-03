<?php

use LaravelEnso\Migrator\App\Database\Migration;

class CreateStructureForAddrs extends Migration
{
    protected $permissions = [
        ['name' => 'addrs.index', 'description' => 'Show index for addrs', 'is_default' => false],

        ['name' => 'addrs.create', 'description' => 'Create addr', 'is_default' => false],
        ['name' => 'addrs.store', 'description' => 'Store a new addr', 'is_default' => false],
        ['name' => 'addrs.show', 'description' => 'Show addr', 'is_default' => false],
        ['name' => 'addrs.edit', 'description' => 'Edit addr', 'is_default' => false],
        ['name' => 'addrs.update', 'description' => 'Update addr', 'is_default' => false],
        ['name' => 'addrs.destroy', 'description' => 'Delete addr', 'is_default' => false],
        ['name' => 'addrs.initTable', 'description' => 'Init table for addrs', 'is_default' => false],

        ['name' => 'addrs.tableData', 'description' => 'Get table data for addrs', 'is_default' => false],

        ['name' => 'addrs.exportExcel', 'description' => 'Export excel for addrs', 'is_default' => false],

        ['name' => 'addrs.options', 'description' => 'Get addr options for select', 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Addresses', 'icon' => 'book', 'route' => 'addrs.index', 'order_index' => 999, 'has_children' => false
    ];

    protected $parentMenu = 'Information';
}

