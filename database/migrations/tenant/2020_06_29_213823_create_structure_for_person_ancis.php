<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForPersonAncis extends Migration
{
    protected array $permissions = [
        ['name' => 'personanci.index', 'description' => 'Show index for person ancis', 'is_default' => true],

        ['name' => 'personanci.create', 'description' => 'Create person anci', 'is_default' => true],
        ['name' => 'personanci.store', 'description' => 'Store a new person anci', 'is_default' => true],
        ['name' => 'personanci.show', 'description' => 'Show person anci', 'is_default' => true],
        ['name' => 'personanci.edit', 'description' => 'Edit person anci', 'is_default' => true],
        ['name' => 'personanci.update', 'description' => 'Update person anci', 'is_default' => true],
        ['name' => 'personanci.destroy', 'description' => 'Delete person anci', 'is_default' => true],
        ['name' => 'personanci.initTable', 'description' => 'Init table for person ancis', 'is_default' => true],

        ['name' => 'personanci.tableData', 'description' => 'Get table data for person ancis', 'is_default' => true],

        ['name' => 'personanci.exportExcel', 'description' => 'Export excel for person ancis', 'is_default' => true],

        ['name' => 'personanci.options', 'description' => 'Get person anci options for select', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Person Anci', 'icon' => 'book', 'route' => 'personanci.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'People';
}
