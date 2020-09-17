<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForCitations extends Migration
{
    protected array $permissions = [
        ['name' => 'citations.index', 'description' => 'Show index for citations', 'is_default' => true],

        ['name' => 'citations.create', 'description' => 'Create citation', 'is_default' => true],
        ['name' => 'citations.store', 'description' => 'Store a new citation', 'is_default' => true],
        ['name' => 'citations.show', 'description' => 'Show citation', 'is_default' => true],
        ['name' => 'citations.edit', 'description' => 'Edit citation', 'is_default' => true],
        ['name' => 'citations.update', 'description' => 'Update citation', 'is_default' => true],
        ['name' => 'citations.destroy', 'description' => 'Delete citation', 'is_default' => true],
        ['name' => 'citations.initTable', 'description' => 'Init table for citations', 'is_default' => true],

        ['name' => 'citations.tableData', 'description' => 'Get table data for citations', 'is_default' => true],

        ['name' => 'citations.exportExcel', 'description' => 'Export excel for citations', 'is_default' => true],

        ['name' => 'citations.options', 'description' => 'Get citation options for select', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Citations', 'icon' => 'users', 'route' => 'citations.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'References';
}
