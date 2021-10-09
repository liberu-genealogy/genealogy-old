<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForDnamatching extends Migration
{
    protected array $permissions = [
        ['name' => 'dnamatching.index', 'description' => 'Show index for dnamatching', 'is_default' => true],

        ['name' => 'dnamatching.create', 'description' => 'Create family', 'is_default' => true],
        ['name' => 'dnamatching.store', 'description' => 'Store a new family', 'is_default' => true],
        ['name' => 'dnamatching.show', 'description' => 'Show family', 'is_default' => true],
        ['name' => 'dnamatching.edit', 'description' => 'Edit family', 'is_default' => true],
        ['name' => 'dnamatching.update', 'description' => 'Update family', 'is_default' => true],
        ['name' => 'dnamatching.destroy', 'description' => 'Delete family', 'is_default' => true],
        ['name' => 'dnamatching.initTable', 'description' => 'Init table for dnamatching', 'is_default' => true],

        ['name' => 'dnamatching.tableData', 'description' => 'Get table data for dnamatching', 'is_default' => true],

        ['name' => 'dnamatching.exportExcel', 'description' => 'Export excel for dnamatching', 'is_default' => true],

        ['name' => 'dnamatching.options', 'description' => 'Get family options for select', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Matches', 'icon' => 'users', 'route' => 'dnamatching.index', 'order_index' => 998, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'Dna';
}
