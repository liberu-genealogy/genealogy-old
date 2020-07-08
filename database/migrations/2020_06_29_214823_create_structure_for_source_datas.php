<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForSourceDatas extends Migration
{
    protected array $permissions = [
        ['name' => 'sourcedata.index', 'description' => 'Show index for source datas', 'is_default' => true],

        ['name' => 'sourcedata.create', 'description' => 'Create source data', 'is_default' => true],
        ['name' => 'sourcedata.store', 'description' => 'Store a new source data', 'is_default' => true],
        ['name' => 'sourcedata.show', 'description' => 'Show source data', 'is_default' => true],
        ['name' => 'sourcedata.edit', 'description' => 'Edit source data', 'is_default' => true],
        ['name' => 'sourcedata.update', 'description' => 'Update source data', 'is_default' => true],
        ['name' => 'sourcedata.destroy', 'description' => 'Delete source data', 'is_default' => true],
        ['name' => 'sourcedata.initTable', 'description' => 'Init table for source datas', 'is_default' => true],

        ['name' => 'sourcedata.tableData', 'description' => 'Get table data for source datas', 'is_default' => true],

        ['name' => 'sourcedata.exportExcel', 'description' => 'Export excel for source datas', 'is_default' => true],

        ['name' => 'sourcedata.options', 'description' => 'Get source data options for select', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Source Data', 'icon' => 'book', 'route' => 'sourcedata.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'Sources';
}
