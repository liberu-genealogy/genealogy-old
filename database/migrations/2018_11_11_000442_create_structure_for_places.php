<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForPlaces extends StructureMigration
{
    protected $permissions = [
        ['name' => 'place.index', 'description' => 'Show index for place', 'type' => 0, 'is_default' => false],
        ['name' => 'place.create', 'description' => 'Create place', 'type' => 1, 'is_default' => false],
        ['name' => 'place.store', 'description' => 'Store a new place', 'type' => 1, 'is_default' => false],
        ['name' => 'place.show', 'description' => 'Show place', 'type' => 1, 'is_default' => false],
        ['name' => 'place.edit', 'description' => 'Edit place', 'type' => 1, 'is_default' => false],
        ['name' => 'place.update', 'description' => 'Update place', 'type' => 1, 'is_default' => false],
        ['name' => 'place.destroy', 'description' => 'Delete place', 'type' => 1, 'is_default' => false],
        ['name' => 'place.initTable', 'description' => 'Init table for place', 'type' => 0, 'is_default' => false],
        ['name' => 'place.tableData', 'description' => 'Get table data for place', 'type' => 0, 'is_default' => false],
        ['name' => 'place.exportExcel', 'description' => 'Export excel for place', 'type' => 0, 'is_default' => false],
        ['name' => 'place.options', 'description' => 'Get place options for select', 'type' => 0, 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Places', 'icon' => 'book', 'route' => 'place.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected $parentMenu = '';
}
