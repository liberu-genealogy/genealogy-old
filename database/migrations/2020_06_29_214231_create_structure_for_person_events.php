<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForPersonEvents extends Migration
{
    protected array $permissions = [
        ['name' => 'personevent.index', 'description' => 'Show index for person events', 'is_default' => true],

        ['name' => 'personevent.create', 'description' => 'Create person event', 'is_default' => true],
        ['name' => 'personevent.store', 'description' => 'Store a new person event', 'is_default' => true],
        ['name' => 'personevent.show', 'description' => 'Show person event', 'is_default' => true],
        ['name' => 'personevent.edit', 'description' => 'Edit person event', 'is_default' => true],
        ['name' => 'personevent.update', 'description' => 'Update person event', 'is_default' => true],
        ['name' => 'personevent.destroy', 'description' => 'Delete person event', 'is_default' => true],
        ['name' => 'personevent.initTable', 'description' => 'Init table for person events', 'is_default' => true],

        ['name' => 'personevent.tableData', 'description' => 'Get table data for person events', 'is_default' => true],

        ['name' => 'personevent.exportExcel', 'description' => 'Export excel for person events', 'is_default' => true],

        ['name' => 'personevent.options', 'description' => 'Get person event options for select', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Person Events', 'icon' => 'book', 'route' => 'personevent.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'People';
}
