<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForAddrs extends Migration
{
    protected array $permissions = [
        ['name' => 'addrs.index', 'description' => 'Show index for addrs', 'is_default' => true],

        ['name' => 'addrs.create', 'description' => 'Create addr', 'is_default' => true],
        ['name' => 'addrs.store', 'description' => 'Store a new addr', 'is_default' => true],
        ['name' => 'addrs.show', 'description' => 'Show addr', 'is_default' => true],
        ['name' => 'addrs.edit', 'description' => 'Edit addr', 'is_default' => true],
        ['name' => 'addrs.update', 'description' => 'Update addr', 'is_default' => true],
        ['name' => 'addrs.destroy', 'description' => 'Delete addr', 'is_default' => true],
        ['name' => 'addrs.initTable', 'description' => 'Init table for addrs', 'is_default' => true],

        ['name' => 'addrs.tableData', 'description' => 'Get table data for addrs', 'is_default' => true],

        ['name' => 'addrs.exportExcel', 'description' => 'Export excel for addrs', 'is_default' => true],

        ['name' => 'addrs.options', 'description' => 'Get addr options for select', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Addresses', 'icon' => 'book', 'route' => 'addrs.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'Information';
}
