<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForEvents extends Migration
{
    protected array $permissions = [
        ['name' => 'core.calendar.events.index', 'description' => 'Get events', 'is_default' => true],
        ['name' => 'core.calendar.events.create', 'description' => 'Create a new event', 'is_default' => true],
        ['name' => 'core.calendar.events.store', 'description' => 'Store a new event', 'is_default' => true],
        ['name' => 'core.calendar.events.edit', 'description' => 'Edit event', 'is_default' => true],
        ['name' => 'core.calendar.events.update', 'description' => 'Update event', 'is_default' => true],
        ['name' => 'core.calendar.events.destroy', 'description' => 'Delete event', 'is_default' => true],
    ];
}
