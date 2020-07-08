<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForPersonLds extends Migration
{
    protected array $permissions = [
        ['name' => 'personlds.index', 'description' => 'Show index for person lds', 'is_default' => true],

        ['name' => 'personlds.create', 'description' => 'Create person lds', 'is_default' => true],
        ['name' => 'personlds.store', 'description' => 'Store a new person lds', 'is_default' => true],
        ['name' => 'personlds.show', 'description' => 'Show person lds', 'is_default' => true],
        ['name' => 'personlds.edit', 'description' => 'Edit person lds', 'is_default' => true],
        ['name' => 'personlds.update', 'description' => 'Update person lds', 'is_default' => true],
        ['name' => 'personlds.destroy', 'description' => 'Delete person lds', 'is_default' => true],
        ['name' => 'personlds.initTable', 'description' => 'Init table for person lds', 'is_default' => true],

        ['name' => 'personlds.tableData', 'description' => 'Get table data for person lds', 'is_default' => true],

        ['name' => 'personlds.exportExcel', 'description' => 'Export excel for person lds', 'is_default' => true],

        ['name' => 'personlds.options', 'description' => 'Get person lds options for select', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Person LDS', 'icon' => 'book', 'route' => 'personlds.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'People';
}
