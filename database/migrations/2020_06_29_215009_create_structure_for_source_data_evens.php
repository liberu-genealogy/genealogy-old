<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForSourceDataEvens extends Migration
{
    protected array $permissions = [
        ['name' => 'sourcedataeven.index', 'description' => 'Show index for source data evens', 'is_default' => true],

        ['name' => 'sourcedataeven.create', 'description' => 'Create source data even', 'is_default' => true],
        ['name' => 'sourcedataeven.store', 'description' => 'Store a new source data even', 'is_default' => true],
        ['name' => 'sourcedataeven.show', 'description' => 'Show source data even', 'is_default' => true],
        ['name' => 'sourcedataeven.edit', 'description' => 'Edit source data even', 'is_default' => true],
        ['name' => 'sourcedataeven.update', 'description' => 'Update source data even', 'is_default' => true],
        ['name' => 'sourcedataeven.destroy', 'description' => 'Delete source data even', 'is_default' => true],
        ['name' => 'sourcedataeven.initTable', 'description' => 'Init table for source data evens', 'is_default' => true],

        ['name' => 'sourcedataeven.tableData', 'description' => 'Get table data for source data evens', 'is_default' => true],

        ['name' => 'sourcedataeven.exportExcel', 'description' => 'Export excel for source data evens', 'is_default' => true],

        ['name' => 'sourcedataeven.options', 'description' => 'Get source data even options for select', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Source Data Events', 'icon' => 'book', 'route' => 'sourcedataeven.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'Sources';
}
