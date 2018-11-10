<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForPlaces extends StructureMigration
{
    protected $permissions = [
        ['name' => 'places.index', 'description' => 'Show index for place', 'type' => 0, 'is_default' => false],
        ['name' => 'places.create', 'description' => 'Create place', 'type' => 1, 'is_default' => false],
        ['name' => 'places.store', 'description' => 'Store a new place', 'type' => 1, 'is_default' => false],
        ['name' => 'places.show', 'description' => 'Show place', 'type' => 1, 'is_default' => false],
        ['name' => 'places.edit', 'description' => 'Edit place', 'type' => 1, 'is_default' => false],
        ['name' => 'places.update', 'description' => 'Update place', 'type' => 1, 'is_default' => false],
        ['name' => 'places.destroy', 'description' => 'Delete place', 'type' => 1, 'is_default' => false],
        ['name' => 'places.initTable', 'description' => 'Init table for place', 'type' => 0, 'is_default' => false],
        ['name' => 'places.tableData', 'description' => 'Get table data for place', 'type' => 0, 'is_default' => false],
        ['name' => 'places.exportExcel', 'description' => 'Export excel for place', 'type' => 0, 'is_default' => false],
        ['name' => 'places.options', 'description' => 'Get place options for select', 'type' => 0, 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Places', 'icon' => 'book', 'route' => 'places.index', 'order_index' => 999, 'has_children' => false
    ];

    protected $parentMenu = '';
}

