<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForDna extends Migration
{
    protected array $permissions = [
        ['name' => 'dna.index', 'description' => 'Show index for dna', 'is_default' => true],

        ['name' => 'dna.create', 'description' => 'Create family', 'is_default' => true],
        ['name' => 'dna.store', 'description' => 'Store a new family', 'is_default' => true],
        ['name' => 'dna.show', 'description' => 'Show family', 'is_default' => true],
        ['name' => 'dna.edit', 'description' => 'Edit family', 'is_default' => true],
        ['name' => 'dna.update', 'description' => 'Update family', 'is_default' => true],
        ['name' => 'dna.destroy', 'description' => 'Delete family', 'is_default' => true],
        ['name' => 'dna.initTable', 'description' => 'Init table for dna', 'is_default' => true],

        ['name' => 'dna.tableData', 'description' => 'Get table data for dna', 'is_default' => true],

        ['name' => 'dna.exportExcel', 'description' => 'Export excel for dna', 'is_default' => true],

        ['name' => 'dna.options', 'description' => 'Get family options for select', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'dna', 'icon' => 'users', 'route' => 'dna.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'Dna';
}
