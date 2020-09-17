<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForPersonSubms extends Migration
{
    protected array $permissions = [
        ['name' => 'personsubm.index', 'description' => 'Show index for person subms', 'is_default' => true],

        ['name' => 'personsubm.create', 'description' => 'Create person subm', 'is_default' => true],
        ['name' => 'personsubm.store', 'description' => 'Store a new person subm', 'is_default' => true],
        ['name' => 'personsubm.show', 'description' => 'Show person subm', 'is_default' => true],
        ['name' => 'personsubm.edit', 'description' => 'Edit person subm', 'is_default' => true],
        ['name' => 'personsubm.update', 'description' => 'Update person subm', 'is_default' => true],
        ['name' => 'personsubm.destroy', 'description' => 'Delete person subm', 'is_default' => true],
        ['name' => 'personsubm.initTable', 'description' => 'Init table for person subms', 'is_default' => true],

        ['name' => 'personsubm.tableData', 'description' => 'Get table data for person subms', 'is_default' => true],

        ['name' => 'personsubm.exportExcel', 'description' => 'Export excel for person subms', 'is_default' => true],

        ['name' => 'personsubm.options', 'description' => 'Get person subm options for select', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Person Subm', 'icon' => 'book', 'route' => 'personsubm.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'People';
}
