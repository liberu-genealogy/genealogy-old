<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForAuthors extends Migration
{
    protected array $permissions = [
        ['name' => 'authors.index', 'description' => 'Show index for authors', 'is_default' => true],

        ['name' => 'authors.create', 'description' => 'Create author', 'is_default' => true],
        ['name' => 'authors.store', 'description' => 'Store a new author', 'is_default' => true],
        ['name' => 'authors.show', 'description' => 'Show author', 'is_default' => true],
        ['name' => 'authors.edit', 'description' => 'Edit author', 'is_default' => true],
        ['name' => 'authors.update', 'description' => 'Update author', 'is_default' => true],
        ['name' => 'authors.destroy', 'description' => 'Delete author', 'is_default' => true],
        ['name' => 'authors.initTable', 'description' => 'Init table for authors', 'is_default' => true],

        ['name' => 'authors.tableData', 'description' => 'Get table data for authors', 'is_default' => true],

        ['name' => 'authors.exportExcel', 'description' => 'Export excel for authors', 'is_default' => true],

        ['name' => 'authors.options', 'description' => 'Get author options for select', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Authors', 'icon' => 'users', 'route' => 'authors.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'References';
}
