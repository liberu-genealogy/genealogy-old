<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForTypes extends Migration
{
    protected array $permissions = [
        ['name' => 'types.index', 'description' => 'Show index for types', 'is_default' => true],

        ['name' => 'types.create', 'description' => 'Create type', 'is_default' => true],
        ['name' => 'types.store', 'description' => 'Store a new type', 'is_default' => true],
        ['name' => 'types.show', 'description' => 'Show type', 'is_default' => true],
        ['name' => 'types.edit', 'description' => 'Edit type', 'is_default' => true],
        ['name' => 'types.update', 'description' => 'Update type', 'is_default' => true],
        ['name' => 'types.destroy', 'description' => 'Delete type', 'is_default' => true],
        ['name' => 'types.initTable', 'description' => 'Init table for types', 'is_default' => true],

        ['name' => 'types.tableData', 'description' => 'Get table data for types', 'is_default' => true],

        ['name' => 'types.exportExcel', 'description' => 'Export excel for types', 'is_default' => true],

        ['name' => 'types.options', 'description' => 'Get type options for select', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Types', 'icon' => 'users', 'route' => 'types.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'References';
}
