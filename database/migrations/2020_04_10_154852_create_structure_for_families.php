<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForFamilies extends Migration
{
    protected array $permissions = [
        ['name' => 'families.index', 'description' => 'Show index for families', 'is_default' => true],

        ['name' => 'families.create', 'description' => 'Create family', 'is_default' => true],
        ['name' => 'families.store', 'description' => 'Store a new family', 'is_default' => true],
        ['name' => 'families.show', 'description' => 'Show family', 'is_default' => true],
        ['name' => 'families.edit', 'description' => 'Edit family', 'is_default' => true],
        ['name' => 'families.update', 'description' => 'Update family', 'is_default' => true],
        ['name' => 'families.destroy', 'description' => 'Delete family', 'is_default' => true],
        ['name' => 'families.initTable', 'description' => 'Init table for families', 'is_default' => true],

        ['name' => 'families.tableData', 'description' => 'Get table data for families', 'is_default' => true],

        ['name' => 'families.exportExcel', 'description' => 'Export excel for families', 'is_default' => true],

        ['name' => 'families.options', 'description' => 'Get family options for select', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Families', 'icon' => 'users', 'route' => 'families.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'Family';
}
