<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForActivityLogs extends Migration
{
    protected array $permissions = [
        ['name' => 'core.activityLogs.index', 'description' => 'Show index for activity log', 'is_default' => false],
    ];

    protected array $menu = [
        'name' => 'Activity Log', 'icon' => 'shoe-prints', 'route' => 'core.activityLogs.index', 'order_index' => 900, 'has_children' => false,
    ];
}
