<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForEvents extends StructureMigration
{
    protected $permissions = [
        ['name' => 'event.index', 'description' => 'Show index for event', 'type' => 0, 'is_default' => false],
        ['name' => 'event.create', 'description' => 'Create event', 'type' => 1, 'is_default' => false],
        ['name' => 'event.store', 'description' => 'Store a new event', 'type' => 1, 'is_default' => false],
        ['name' => 'event.show', 'description' => 'Show event', 'type' => 1, 'is_default' => false],
        ['name' => 'event.edit', 'description' => 'Edit event', 'type' => 1, 'is_default' => false],
        ['name' => 'event.update', 'description' => 'Update event', 'type' => 1, 'is_default' => false],
        ['name' => 'event.destroy', 'description' => 'Delete event', 'type' => 1, 'is_default' => false],
        ['name' => 'event.initTable', 'description' => 'Init table for event', 'type' => 0, 'is_default' => false],
        ['name' => 'event.tableData', 'description' => 'Get table data for event', 'type' => 0, 'is_default' => false],
        ['name' => 'event.exportExcel', 'description' => 'Export excel for event', 'type' => 0, 'is_default' => false],
        ['name' => 'event.options', 'description' => 'Get event options for select', 'type' => 0, 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Events', 'icon' => 'book', 'route' => 'event.index', 'order_index' => 999, 'has_children' => false
    ];

    protected $parentMenu = '';
}

