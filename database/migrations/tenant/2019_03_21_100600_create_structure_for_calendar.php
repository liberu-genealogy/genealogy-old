<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForCalendar extends Migration
{
    protected array $permissions = [
        ['name' => 'core.calendar.create', 'description' => 'Create a new calendar', 'is_default' => true],
        ['name' => 'core.calendar.store', 'description' => 'Store a new calendar', 'is_default' => true],
        ['name' => 'core.calendar.edit', 'description' => 'Edit calendar', 'is_default' => true],
        ['name' => 'core.calendar.update', 'description' => 'Update calendar', 'is_default' => true],
        ['name' => 'core.calendar.destroy', 'description' => 'Delete calendar', 'is_default' => true],
        ['name' => 'core.calendar.index', 'description' => 'Get calendars', 'is_default' => true],
        ['name' => 'core.calendar.options', 'description' => 'Get options for select', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Calendar', 'icon' => 'calendar-alt', 'route' => 'core.calendar.index', 'order_index' => 200, 'has_children' => false,
    ];
}
