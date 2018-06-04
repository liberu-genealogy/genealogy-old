<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForEvents extends StructureMigration
{
    protected $permissions = [
        ['name' => 'events.index', 'description' => 'Work Orders index', 'type' => 0, 'is_default' => false],
        ['name' => 'events.create', 'description' => 'Get create form  for Work Orders', 'type' => 0, 'is_default' => false],
        ['name' => 'events.edit', 'description' => 'Get edit form for events', 'type' => 0, 'is_default' => false],
        ['name' => 'events.update', 'description' => 'Update edited event', 'type' => 1, 'is_default' => false],
        ['name' => 'events.store', 'description' => 'Store newly created event', 'type' => 1, 'is_default' => false],
        ['name' => 'events.destroy', 'description' => 'Delete event', 'type' => 1, 'is_default' => false],
        ['name' => 'events.initTable', 'description' => 'Init table for events', 'type' => 0, 'is_default' => false],
        ['name' => 'events.getTableData', 'description' => 'Get table data for events', 'type' => 0, 'is_default' => false],
        ['name' => 'events.exportExcel', 'description' => 'Export excel for events', 'type' => 0, 'is_default' => false],
        ['name' => 'events.selectOptions', 'description' => 'Get work order_indexs list for vue select', 'type' => 0, 'is_default' => false],
    ];

    protected $permissionGroup = [
        'name' => 'events', 'description' => 'Event group',
    ];

    protected $menu = [
        'name' => 'Events', 'icon' => 'tasks', 'link' => 'events.index', 'order_index' => 999, 'has_children' => false,
    ];
}
