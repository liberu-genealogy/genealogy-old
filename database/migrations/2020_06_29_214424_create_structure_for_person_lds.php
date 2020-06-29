<?php

use LaravelEnso\Migrator\App\Database\Migration;

class CreateStructureForPersonLds extends Migration
{
    protected $permissions = [
        ['name' => 'personlds.index', 'description' => 'Show index for person lds', 'is_default' => false],

        ['name' => 'personlds.create', 'description' => 'Create person lds', 'is_default' => false],
        ['name' => 'personlds.store', 'description' => 'Store a new person lds', 'is_default' => false],
        ['name' => 'personlds.show', 'description' => 'Show person lds', 'is_default' => false],
        ['name' => 'personlds.edit', 'description' => 'Edit person lds', 'is_default' => false],
        ['name' => 'personlds.update', 'description' => 'Update person lds', 'is_default' => false],
        ['name' => 'personlds.destroy', 'description' => 'Delete person lds', 'is_default' => false],
        ['name' => 'personlds.initTable', 'description' => 'Init table for person lds', 'is_default' => false],

        ['name' => 'personlds.tableData', 'description' => 'Get table data for person lds', 'is_default' => false],

        ['name' => 'personlds.exportExcel', 'description' => 'Export excel for person lds', 'is_default' => false],

        ['name' => 'personlds.options', 'description' => 'Get person lds options for select', 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Person LDS', 'icon' => 'book', 'route' => 'personlds.index', 'order_index' => 999, 'has_children' => false
    ];

    protected $parentMenu = 'Administration';
}

