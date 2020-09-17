<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForFamilyEvents extends Migration
{
    protected array $permissions = [
        ['name' => 'familyevents.index', 'description' => 'Show index for family events', 'is_default' => true],

        ['name' => 'familyevents.create', 'description' => 'Create family event', 'is_default' => true],
        ['name' => 'familyevents.store', 'description' => 'Store a new family event', 'is_default' => true],
        ['name' => 'familyevents.show', 'description' => 'Show family event', 'is_default' => true],
        ['name' => 'familyevents.edit', 'description' => 'Edit family event', 'is_default' => true],
        ['name' => 'familyevents.update', 'description' => 'Update family event', 'is_default' => true],
        ['name' => 'familyevents.destroy', 'description' => 'Delete family event', 'is_default' => true],
        ['name' => 'familyevents.initTable', 'description' => 'Init table for family events', 'is_default' => true],

        ['name' => 'familyevents.tableData', 'description' => 'Get table data for family events', 'is_default' => true],

        ['name' => 'familyevents.exportExcel', 'description' => 'Export excel for family events', 'is_default' => true],

        ['name' => 'familyevents.options', 'description' => 'Get family event options for select', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Family Events', 'icon' => 'book', 'route' => 'familyevents.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'Family';
}
