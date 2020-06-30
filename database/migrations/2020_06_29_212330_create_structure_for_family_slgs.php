<?php

use LaravelEnso\Migrator\App\Database\Migration;

class CreateStructureForFamilySlgs extends Migration
{
    protected $permissions = [
        ['name' => 'familyslugs.index', 'description' => 'Show index for family slgs', 'is_default' => false],

        ['name' => 'familyslugs.create', 'description' => 'Create family slgs', 'is_default' => false],
        ['name' => 'familyslugs.store', 'description' => 'Store a new family slgs', 'is_default' => false],
        ['name' => 'familyslugs.show', 'description' => 'Show family slgs', 'is_default' => false],
        ['name' => 'familyslugs.edit', 'description' => 'Edit family slgs', 'is_default' => false],
        ['name' => 'familyslugs.update', 'description' => 'Update family slgs', 'is_default' => false],
        ['name' => 'familyslugs.destroy', 'description' => 'Delete family slgs', 'is_default' => false],
        ['name' => 'familyslugs.initTable', 'description' => 'Init table for family slgs', 'is_default' => false],

        ['name' => 'familyslugs.tableData', 'description' => 'Get table data for family slgs', 'is_default' => false],

        ['name' => 'familyslugs.exportExcel', 'description' => 'Export excel for family slgs', 'is_default' => false],

        ['name' => 'familyslugs.options', 'description' => 'Get family slgs options for select', 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Family Slugs', 'icon' => 'book', 'route' => 'familyslugs.index', 'order_index' => 999, 'has_children' => false
    ];

    protected $parentMenu = 'Families';
}

