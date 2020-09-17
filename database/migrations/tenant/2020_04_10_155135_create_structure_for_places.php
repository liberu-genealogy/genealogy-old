<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForPlaces extends Migration
{
    protected array $permissions = [
        ['name' => 'places.index', 'description' => 'Show index for places', 'is_default' => true],

        ['name' => 'places.create', 'description' => 'Create place', 'is_default' => true],
        ['name' => 'places.store', 'description' => 'Store a new place', 'is_default' => true],
        ['name' => 'places.show', 'description' => 'Show place', 'is_default' => true],
        ['name' => 'places.edit', 'description' => 'Edit place', 'is_default' => true],
        ['name' => 'places.update', 'description' => 'Update place', 'is_default' => true],
        ['name' => 'places.destroy', 'description' => 'Delete place', 'is_default' => true],
        ['name' => 'places.initTable', 'description' => 'Init table for places', 'is_default' => true],

        ['name' => 'places.tableData', 'description' => 'Get table data for places', 'is_default' => true],

        ['name' => 'places.exportExcel', 'description' => 'Export excel for places', 'is_default' => true],

        ['name' => 'places.options', 'description' => 'Get place options for select', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Places', 'icon' => 'users', 'route' => 'places.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'References';
}
