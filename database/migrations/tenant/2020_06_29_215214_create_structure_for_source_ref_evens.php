<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForSourceRefEvens extends Migration
{
    protected array $permissions = [
        ['name' => 'sourcerefeven.index', 'description' => 'Show index for source ref evens', 'is_default' => true],

        ['name' => 'sourcerefeven.create', 'description' => 'Create source ref even', 'is_default' => true],
        ['name' => 'sourcerefeven.store', 'description' => 'Store a new source ref even', 'is_default' => true],
        ['name' => 'sourcerefeven.show', 'description' => 'Show source ref even', 'is_default' => true],
        ['name' => 'sourcerefeven.edit', 'description' => 'Edit source ref even', 'is_default' => true],
        ['name' => 'sourcerefeven.update', 'description' => 'Update source ref even', 'is_default' => true],
        ['name' => 'sourcerefeven.destroy', 'description' => 'Delete source ref even', 'is_default' => true],
        ['name' => 'sourcerefeven.initTable', 'description' => 'Init table for source ref evens', 'is_default' => true],

        ['name' => 'sourcerefeven.tableData', 'description' => 'Get table data for source ref evens', 'is_default' => true],

        ['name' => 'sourcerefeven.exportExcel', 'description' => 'Export excel for source ref evens', 'is_default' => true],

        ['name' => 'sourcerefeven.options', 'description' => 'Get source ref even options for select', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Source Ref Events', 'icon' => 'book', 'route' => 'sourcerefeven.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'Sources';
}
