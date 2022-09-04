<?php

use LaravelEnso\Migrator\Database\Migration;

return new class extends Migration
{
    protected array $permissions = [
        ['name' => 'social.categories.index', 'description' => 'Show index for categories', 'is_default' => true],
        ['name' => 'social.categories.create', 'description' => 'Create category', 'is_default' => false],
        ['name' => 'social.categories.store', 'description' => 'Store a new category', 'is_default' => true],
        ['name' => 'social.categories.edit', 'description' => 'Edit category', 'is_default' => true],
        ['name' => 'social.categories.update', 'description' => 'Update category', 'is_default' => false],
        ['name' => 'social.categories.destroy', 'description' => 'Delete category', 'is_default' => false],
        ['name' => 'social.categories.initTable', 'description' => 'Init table for categories', 'is_default' => true],
        ['name' => 'social.categories.tableData', 'description' => 'Get table data for categories', 'is_default' => true],
        ['name' => 'social.categories.exportExcel', 'description' => 'Export excel for categories', 'is_default' => true],
        ['name' => 'social.categories.options', 'description' => 'Get category options for select', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Category', 'icon' => 'users', 'route' => 'social.categories.index', 'order_index' => 1001, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'Social';
};
