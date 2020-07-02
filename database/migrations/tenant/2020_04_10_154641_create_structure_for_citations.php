<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForCitations extends Migration
{
    protected array $permissions = [
        ['name' => 'citations.index', 'description' => 'Show index for citations', 'is_default' => false],

        ['name' => 'citations.create', 'description' => 'Create citation', 'is_default' => false],
        ['name' => 'citations.store', 'description' => 'Store a new citation', 'is_default' => false],
        ['name' => 'citations.show', 'description' => 'Show citation', 'is_default' => false],
        ['name' => 'citations.edit', 'description' => 'Edit citation', 'is_default' => false],
        ['name' => 'citations.update', 'description' => 'Update citation', 'is_default' => false],
        ['name' => 'citations.destroy', 'description' => 'Delete citation', 'is_default' => false],
        ['name' => 'citations.initTable', 'description' => 'Init table for citations', 'is_default' => false],

        ['name' => 'citations.tableData', 'description' => 'Get table data for citations', 'is_default' => false],

        ['name' => 'citations.exportExcel', 'description' => 'Export excel for citations', 'is_default' => false],

        ['name' => 'citations.options', 'description' => 'Get citation options for select', 'is_default' => false],
    ];

    protected array $menu = [
        'name' => 'Citations', 'icon' => 'users', 'route' => 'citations.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'References';
}
