<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForPersonAlias extends Migration
{
    protected array $permissions = [
        ['name' => 'personalias.index', 'description' => 'Show index for person alias', 'is_default' => false],

        ['name' => 'personalias.create', 'description' => 'Create person alia', 'is_default' => false],
        ['name' => 'personalias.store', 'description' => 'Store a new person alia', 'is_default' => false],
        ['name' => 'personalias.show', 'description' => 'Show person alia', 'is_default' => false],
        ['name' => 'personalias.edit', 'description' => 'Edit person alia', 'is_default' => false],
        ['name' => 'personalias.update', 'description' => 'Update person alia', 'is_default' => false],
        ['name' => 'personalias.destroy', 'description' => 'Delete person alia', 'is_default' => false],
        ['name' => 'personalias.initTable', 'description' => 'Init table for person alias', 'is_default' => false],

        ['name' => 'personalias.tableData', 'description' => 'Get table data for person alias', 'is_default' => false],

        ['name' => 'personalias.exportExcel', 'description' => 'Export excel for person alias', 'is_default' => false],

        ['name' => 'personalias.options', 'description' => 'Get person alia options for select', 'is_default' => false],
    ];

    protected array $menu = [
        'name' => 'Person Aliases', 'icon' => 'book', 'route' => 'personalias.index', 'order_index' => 999, 'has_children' => false
    ];

    protected ?string $parentMenu = 'People';
}
