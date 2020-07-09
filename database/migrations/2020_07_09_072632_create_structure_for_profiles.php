<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForProfiles extends Migration
{
    protected array $permissions = [
        ['name' => 'profile.index', 'description' => 'Show index for profiles', 'is_default' => false],

        ['name' => 'profile.show', 'description' => 'Show profile', 'is_default' => false],
        ['name' => 'profile.edit', 'description' => 'Edit profile', 'is_default' => false],
        ['name' => 'profile.update', 'description' => 'Update profile', 'is_default' => false],
        ['name' => 'profile.options', 'description' => 'Get profile options for select', 'is_default' => false],
    ];

    protected array $menu = [
        'name' => 'Profile', 'icon' => 'book', 'route' => 'profile.index', 'order_index' => 999, 'has_children' => false
    ];

    protected ?string $parentMenu = 'Profile';
}

