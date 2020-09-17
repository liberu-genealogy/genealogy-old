<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForFamilySlgs extends Migration
{
    protected array $permissions = [
        ['name' => 'familyslugs.index', 'description' => 'Show index for family slgs', 'is_default' => true],

        ['name' => 'familyslugs.create', 'description' => 'Create family slgs', 'is_default' => true],
        ['name' => 'familyslugs.store', 'description' => 'Store a new family slgs', 'is_default' => true],
        ['name' => 'familyslugs.show', 'description' => 'Show family slgs', 'is_default' => true],
        ['name' => 'familyslugs.edit', 'description' => 'Edit family slgs', 'is_default' => true],
        ['name' => 'familyslugs.update', 'description' => 'Update family slgs', 'is_default' => true],
        ['name' => 'familyslugs.destroy', 'description' => 'Delete family slgs', 'is_default' => true],
        ['name' => 'familyslugs.initTable', 'description' => 'Init table for family slgs', 'is_default' => true],

        ['name' => 'familyslugs.tableData', 'description' => 'Get table data for family slgs', 'is_default' => true],

        ['name' => 'familyslugs.exportExcel', 'description' => 'Export excel for family slgs', 'is_default' => true],

        ['name' => 'familyslugs.options', 'description' => 'Get family slgs options for select', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Family Slugs', 'icon' => 'book', 'route' => 'familyslugs.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'Family';
}
