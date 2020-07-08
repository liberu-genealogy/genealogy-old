<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForSourceDataEvens extends Migration
{
    protected array $permissions = [
        ['name' => 'sourcedataevent.index', 'description' => 'Show index for source data evens', 'is_default' => true],

        ['name' => 'sourcedataevent.create', 'description' => 'Create source data even', 'is_default' => true],
        ['name' => 'sourcedataevent.store', 'description' => 'Store a new source data even', 'is_default' => true],
        ['name' => 'sourcedataevent.show', 'description' => 'Show source data even', 'is_default' => true],
        ['name' => 'sourcedataevent.edit', 'description' => 'Edit source data even', 'is_default' => true],
        ['name' => 'sourcedataevent.update', 'description' => 'Update source data even', 'is_default' => true],
        ['name' => 'sourcedataevent.destroy', 'description' => 'Delete source data even', 'is_default' => true],
        ['name' => 'sourcedataevent.initTable', 'description' => 'Init table for source data evens', 'is_default' => true],

        ['name' => 'sourcedataevent.tableData', 'description' => 'Get table data for source data evens', 'is_default' => true],

        ['name' => 'sourcedataevent.exportExcel', 'description' => 'Export excel for source data evens', 'is_default' => true],

        ['name' => 'sourcedataevent.options', 'description' => 'Get source data even options for select', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Source Data Events', 'icon' => 'book', 'route' => 'sourcedataevent.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'Sources';
}
