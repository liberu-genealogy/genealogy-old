<?php

use LaravelEnso\Migrator\Database\Migration;

return new class extends Migration
{
    protected array $permissions = [
        ['name' => 'social.messages.index', 'description' => 'Show index for messages', 'is_default' => true],
        ['name' => 'social.messages.create', 'description' => 'Create message', 'is_default' => true],
        ['name' => 'social.messages.store', 'description' => 'Store a new message', 'is_default' => true],
        ['name' => 'social.messages.show', 'description' => 'Show message', 'is_default' => true],
        ['name' => 'social.messages.edit', 'description' => 'Edit message', 'is_default' => true],
        ['name' => 'social.messages.update', 'description' => 'Update message', 'is_default' => true],
        ['name' => 'social.messages.destroy', 'description' => 'Delete message', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Messages', 'icon' => 'users', 'route' => 'social.messages.index', 'order_index' => 1004, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'Social';
};
