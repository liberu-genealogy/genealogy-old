<?php

use LaravelEnso\Migrator\App\Database\Migration;

class CreateStructureForFamilies extends Migration
{
    protected $permissions = [
        ['name' => 'families.index', 'description' => 'Show index for families', 'is_default' => false],

        ['name' => 'families.create', 'description' => 'Create family', 'is_default' => false],
        ['name' => 'families.store', 'description' => 'Store a new family', 'is_default' => false],
        ['name' => 'families.show', 'description' => 'Show family', 'is_default' => false],
        ['name' => 'families.edit', 'description' => 'Edit family', 'is_default' => false],
        ['name' => 'families.update', 'description' => 'Update family', 'is_default' => false],
        ['name' => 'families.destroy', 'description' => 'Delete family', 'is_default' => false],
        ['name' => 'families.initTable', 'description' => 'Init table for families', 'is_default' => false],

        ['name' => 'families.tableData', 'description' => 'Get table data for families', 'is_default' => false],

        ['name' => 'families.exportExcel', 'description' => 'Export excel for families', 'is_default' => false],

        ['name' => 'families.options', 'description' => 'Get family options for select', 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Families', 'icon' => '', 'route' => 'families.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected $parentMenu = '';
}
