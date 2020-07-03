<?php

use LaravelEnso\Migrator\App\Database\Migration;

class CreateStructureForPeople extends Migration
{
    protected $permissions = [
        ['name' => 'administration.people.initTable', 'description' => 'Init table for people', 'is_default' => false],
        ['name' => 'administration.people.tableData', 'description' => 'Get table data for people', 'is_default' => false],
        ['name' => 'administration.people.exportExcel', 'description' => 'Export excel for people', 'is_default' => false],
        ['name' => 'administration.people.options', 'description' => 'Get options for select', 'is_default' => false],
        ['name' => 'administration.people.create', 'description' => 'Create person', 'is_default' => false],
        ['name' => 'administration.people.edit', 'description' => 'Edit existing person', 'is_default' => false],
        ['name' => 'administration.people.index', 'description' => 'Show people index', 'is_default' => false],
        ['name' => 'administration.people.store', 'description' => 'Store newly created person', 'is_default' => false],
        ['name' => 'administration.people.update', 'description' => 'Update edited person', 'is_default' => false],
        ['name' => 'administration.people.destroy', 'description' => 'Delete person', 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'People', 'icon' => 'user-tie', 'route' => 'administration.people.index', 'order_index' => 200, 'has_children' => false,
    ];

    protected $parentMenu = 'Administration';
}
