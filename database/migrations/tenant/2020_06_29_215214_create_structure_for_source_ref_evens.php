<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForSourceRefEvens extends Migration
{
    protected array $permissions = [
        ['name' => 'sourcerefevents.index', 'description' => 'Show index for source ref evens', 'is_default' => true],

        ['name' => 'sourcerefevents.create', 'description' => 'Create source ref even', 'is_default' => true],
        ['name' => 'sourcerefevents.store', 'description' => 'Store a new source ref even', 'is_default' => true],
        ['name' => 'sourcerefevents.show', 'description' => 'Show source ref even', 'is_default' => true],
        ['name' => 'sourcerefevents.edit', 'description' => 'Edit source ref even', 'is_default' => true],
        ['name' => 'sourcerefevents.update', 'description' => 'Update source ref even', 'is_default' => true],
        ['name' => 'sourcerefevents.destroy', 'description' => 'Delete source ref even', 'is_default' => true],
        ['name' => 'sourcerefevents.initTable', 'description' => 'Init table for source ref evens', 'is_default' => true],

        ['name' => 'sourcerefevents.tableData', 'description' => 'Get table data for source ref evens', 'is_default' => true],

        ['name' => 'sourcerefevents.exportExcel', 'description' => 'Export excel for source ref evens', 'is_default' => true],

        ['name' => 'sourcerefevents.options', 'description' => 'Get source ref even options for select', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Source Ref Events', 'icon' => 'book', 'route' => 'sourcerefevents.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'Sources';
}
