<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForChans extends Migration
{
    protected array $permissions = [
        ['name' => 'chan.index', 'description' => 'Show index for chans', 'is_default' => false],

        ['name' => 'chan.create', 'description' => 'Create chan', 'is_default' => false],
        ['name' => 'chan.store', 'description' => 'Store a new chan', 'is_default' => false],
        ['name' => 'chan.show', 'description' => 'Show chan', 'is_default' => false],
        ['name' => 'chan.edit', 'description' => 'Edit chan', 'is_default' => false],
        ['name' => 'chan.update', 'description' => 'Update chan', 'is_default' => false],
        ['name' => 'chan.destroy', 'description' => 'Delete chan', 'is_default' => false],
        ['name' => 'chan.initTable', 'description' => 'Init table for chans', 'is_default' => false],

        ['name' => 'chan.tableData', 'description' => 'Get table data for chans', 'is_default' => false],

        ['name' => 'chan.exportExcel', 'description' => 'Export excel for chans', 'is_default' => false],

        ['name' => 'chan.options', 'description' => 'Get chan options for select', 'is_default' => false],
    ];

    protected array $menu = [
        'name' => 'Chan', 'icon' => 'book', 'route' => 'chan.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'Information';
}
