<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForNotifications extends Migration
{
    protected array $permissions = [
        ['name' => 'core.notifications.index', 'description' => 'Notifications index', 'is_default' => true],
        ['name' => 'core.notifications.count', 'description' => 'Get users notifications count', 'is_default' => true],
        ['name' => 'core.notifications.read', 'description' => 'Mark notification as read', 'is_default' => true],
        ['name' => 'core.notifications.readAll', 'description' => 'Mark all notifications as read', 'is_default' => true],
        ['name' => 'core.notifications.destroy', 'description' => 'Clear a notification', 'is_default' => true],
        ['name' => 'core.notifications.destroyAll', 'description' => 'Clear all notifications', 'is_default' => true],
    ];
}
