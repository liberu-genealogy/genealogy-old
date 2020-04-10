<?php

use LaravelEnso\Migrator\App\Database\Migration;

class CreateStructureForPlaces extends Migration
{
    protected $permissions = [
        ['name' => 'places.index', 'description' => 'Show index for places', 'is_default' => false],

        ['name' => 'places.create', 'description' => 'Create place', 'is_default' => false],
        ['name' => 'places.store', 'description' => 'Store a new place', 'is_default' => false],
        ['name' => 'places.show', 'description' => 'Show place', 'is_default' => false],
        ['name' => 'places.edit', 'description' => 'Edit place', 'is_default' => false],
        ['name' => 'places.update', 'description' => 'Update place', 'is_default' => false],
        ['name' => 'places.destroy', 'description' => 'Delete place', 'is_default' => false],
        ['name' => 'places.initTable', 'description' => 'Init table for places', 'is_default' => false],

        ['name' => 'places.tableData', 'description' => 'Get table data for places', 'is_default' => false],

        ['name' => 'places.exportExcel', 'description' => 'Export excel for places', 'is_default' => false],

        ['name' => 'places.options', 'description' => 'Get place options for select', 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Places', 'icon' => '', 'route' => 'places.index', 'order_index' => 999, 'has_children' => false
    ];

    protected $parentMenu = '';
}

