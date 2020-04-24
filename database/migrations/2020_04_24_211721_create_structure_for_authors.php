<?php

use LaravelEnso\Migrator\App\Database\Migration;

class CreateStructureForAuthors extends Migration
{
    protected $permissions = [
        ['name' => 'authors.index', 'description' => 'Show index for authors', 'is_default' => false],

        ['name' => 'authors.create', 'description' => 'Create author', 'is_default' => false],
        ['name' => 'authors.store', 'description' => 'Store a new author', 'is_default' => false],
        ['name' => 'authors.show', 'description' => 'Show author', 'is_default' => false],
        ['name' => 'authors.edit', 'description' => 'Edit author', 'is_default' => false],
        ['name' => 'authors.update', 'description' => 'Update author', 'is_default' => false],
        ['name' => 'authors.destroy', 'description' => 'Delete author', 'is_default' => false],
        ['name' => 'authors.initTable', 'description' => 'Init table for authors', 'is_default' => false],

        ['name' => 'authors.tableData', 'description' => 'Get table data for authors', 'is_default' => false],

        ['name' => 'authors.exportExcel', 'description' => 'Export excel for authors', 'is_default' => false],

        ['name' => 'authors.options', 'description' => 'Get author options for select', 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Authors', 'icon' => '', 'route' => 'authors.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected $parentMenu = '';
}
