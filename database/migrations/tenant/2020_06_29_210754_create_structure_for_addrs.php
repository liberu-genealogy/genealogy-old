<?php

use LaravelEnso\Migrator\App\Database\Migration;

class CreateStructureForAddrs extends Migration
{
    protected $permissions = [
        ['name' => 'addresses.index', 'description' => 'Show index for addrs', 'is_default' => false],

        ['name' => 'addresses.create', 'description' => 'Create addr', 'is_default' => false],
        ['name' => 'addresses.store', 'description' => 'Store a new addr', 'is_default' => false],
        ['name' => 'addresses.show', 'description' => 'Show addr', 'is_default' => false],
        ['name' => 'addresses.edit', 'description' => 'Edit addr', 'is_default' => false],
        ['name' => 'addresses.update', 'description' => 'Update addr', 'is_default' => false],
        ['name' => 'addresses.destroy', 'description' => 'Delete addr', 'is_default' => false],
        ['name' => 'addresses.initTable', 'description' => 'Init table for addrs', 'is_default' => false],

        ['name' => 'addresses.tableData', 'description' => 'Get table data for addrs', 'is_default' => false],

        ['name' => 'addresses.exportExcel', 'description' => 'Export excel for addrs', 'is_default' => false],

        ['name' => 'addresses.options', 'description' => 'Get addr options for select', 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Addresses', 'icon' => 'book', 'route' => 'addresses.index', 'order_index' => 999, 'has_children' => false
    ];

    protected $parentMenu = 'References';
}

