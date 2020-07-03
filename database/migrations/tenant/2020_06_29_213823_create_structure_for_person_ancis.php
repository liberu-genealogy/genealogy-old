<?php

use LaravelEnso\Migrator\App\Database\Migration;

class CreateStructureForPersonAncis extends Migration
{
    protected $permissions = [
        ['name' => 'personanci.index', 'description' => 'Show index for person ancis', 'is_default' => false],

        ['name' => 'personanci.create', 'description' => 'Create person anci', 'is_default' => false],
        ['name' => 'personanci.store', 'description' => 'Store a new person anci', 'is_default' => false],
        ['name' => 'personanci.show', 'description' => 'Show person anci', 'is_default' => false],
        ['name' => 'personanci.edit', 'description' => 'Edit person anci', 'is_default' => false],
        ['name' => 'personanci.update', 'description' => 'Update person anci', 'is_default' => false],
        ['name' => 'personanci.destroy', 'description' => 'Delete person anci', 'is_default' => false],
        ['name' => 'personanci.initTable', 'description' => 'Init table for person ancis', 'is_default' => false],

        ['name' => 'personanci.tableData', 'description' => 'Get table data for person ancis', 'is_default' => false],

        ['name' => 'personanci.exportExcel', 'description' => 'Export excel for person ancis', 'is_default' => false],

        ['name' => 'personanci.options', 'description' => 'Get person anci options for select', 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Person Anci', 'icon' => 'book', 'route' => 'personanci.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected $parentMenu = 'People';
}
