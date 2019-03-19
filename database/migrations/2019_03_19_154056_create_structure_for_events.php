<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForEvents extends StructureMigration
{
    protected $permissions = [
        ['name' => 'events.index', 'description' => 'Show index for event', 'type' => 0, 'is_default' => false],
        ['name' => 'events.create', 'description' => 'Create event', 'type' => 1, 'is_default' => false],
        ['name' => 'events.store', 'description' => 'Store a new event', 'type' => 1, 'is_default' => false],
        ['name' => 'events.show', 'description' => 'Show event', 'type' => 1, 'is_default' => false],
        ['name' => 'events.edit', 'description' => 'Edit event', 'type' => 1, 'is_default' => false],
        ['name' => 'events.update', 'description' => 'Update event', 'type' => 1, 'is_default' => false],
        ['name' => 'events.destroy', 'description' => 'Delete event', 'type' => 1, 'is_default' => false],
        ['name' => 'events.initTable', 'description' => 'Init table for event', 'type' => 0, 'is_default' => false],
        ['name' => 'events.tableData', 'description' => 'Get table data for event', 'type' => 0, 'is_default' => false],
        ['name' => 'events.exportExcel', 'description' => 'Export excel for event', 'type' => 0, 'is_default' => false],
        ['name' => 'events.options', 'description' => 'Get event options for select', 'type' => 0, 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Event', 'icon' => 'fa-date', 'route' => 'events.index', 'order_index' => 999, 'has_children' => false
    ];

    protected $parentMenu = '';
}

