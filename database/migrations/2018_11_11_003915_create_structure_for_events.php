<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForEvents extends StructureMigration
{
    protected $permissions = [
        ['name' => 'event.index', 'description' => 'Show index for events', 'type' => 0, 'is_default' => false],
        ['name' => 'event.create', 'description' => 'Create events', 'type' => 1, 'is_default' => false],
        ['name' => 'event.store', 'description' => 'Store a new events', 'type' => 1, 'is_default' => false],
        ['name' => 'event.show', 'description' => 'Show events', 'type' => 1, 'is_default' => false],
        ['name' => 'event.edit', 'description' => 'Edit events', 'type' => 1, 'is_default' => false],
        ['name' => 'event.update', 'description' => 'Update events', 'type' => 1, 'is_default' => false],
        ['name' => 'event.destroy', 'description' => 'Delete events', 'type' => 1, 'is_default' => false],
        ['name' => 'event.initTable', 'description' => 'Init table for events', 'type' => 0, 'is_default' => false],
        ['name' => 'event.tableData', 'description' => 'Get table data for events', 'type' => 0, 'is_default' => false],
        ['name' => 'event.exportExcel', 'description' => 'Export excel for events', 'type' => 0, 'is_default' => false],
        ['name' => 'event.options', 'description' => 'Get events options for select', 'type' => 0, 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Events', 'icon' => 'book', 'route' => 'event.index', 'order_index' => 999, 'has_children' => false
    ];

    protected $parentMenu = '';
}

