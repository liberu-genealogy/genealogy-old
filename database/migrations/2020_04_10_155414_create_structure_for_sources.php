<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForSources extends Migration
{
    protected array $permissions = [
        ['name' => 'sources.index', 'description' => 'Show index for sources', 'is_default' => true],

        ['name' => 'sources.create', 'description' => 'Create source', 'is_default' => true],
        ['name' => 'sources.store', 'description' => 'Store a new source', 'is_default' => true],
        ['name' => 'sources.show', 'description' => 'Show source', 'is_default' => true],
        ['name' => 'sources.edit', 'description' => 'Edit source', 'is_default' => true],
        ['name' => 'sources.update', 'description' => 'Update source', 'is_default' => true],
        ['name' => 'sources.destroy', 'description' => 'Delete source', 'is_default' => true],
        ['name' => 'sources.initTable', 'description' => 'Init table for sources', 'is_default' => true],

        ['name' => 'sources.tableData', 'description' => 'Get table data for sources', 'is_default' => true],

        ['name' => 'sources.exportExcel', 'description' => 'Export excel for sources', 'is_default' => true],

        ['name' => 'sources.options', 'description' => 'Get source options for select', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Sources', 'icon' => 'users', 'route' => 'sources.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'Sources';
}
