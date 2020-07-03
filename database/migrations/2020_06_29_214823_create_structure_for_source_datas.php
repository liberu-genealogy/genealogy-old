<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForSourceDatas extends Migration
{
    protected array $permissions = [
        ['name' => 'sourcedata.index', 'description' => 'Show index for source datas', 'is_default' => false],

        ['name' => 'sourcedata.create', 'description' => 'Create source data', 'is_default' => false],
        ['name' => 'sourcedata.store', 'description' => 'Store a new source data', 'is_default' => false],
        ['name' => 'sourcedata.show', 'description' => 'Show source data', 'is_default' => false],
        ['name' => 'sourcedata.edit', 'description' => 'Edit source data', 'is_default' => false],
        ['name' => 'sourcedata.update', 'description' => 'Update source data', 'is_default' => false],
        ['name' => 'sourcedata.destroy', 'description' => 'Delete source data', 'is_default' => false],
        ['name' => 'sourcedata.initTable', 'description' => 'Init table for source datas', 'is_default' => false],

        ['name' => 'sourcedata.tableData', 'description' => 'Get table data for source datas', 'is_default' => false],

        ['name' => 'sourcedata.exportExcel', 'description' => 'Export excel for source datas', 'is_default' => false],

        ['name' => 'sourcedata.options', 'description' => 'Get source data options for select', 'is_default' => false],
    ];

    protected array $menu = [
        'name' => 'Source Data', 'icon' => 'book', 'route' => 'sourcedata.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'Sources';
}
