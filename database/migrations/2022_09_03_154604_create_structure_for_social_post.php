<?php

use LaravelEnso\Migrator\Database\Migration;

return new class extends Migration
{
    protected array $permissions = [
        ['name' => 'social.posts.index', 'description' => 'Show index for posts', 'is_default' => true],
        ['name' => 'social.posts.create', 'description' => 'Create post', 'is_default' => true],
        ['name' => 'social.posts.store', 'description' => 'Store a new post', 'is_default' => true],
        ['name' => 'social.posts.show', 'description' => 'Show post', 'is_default' => true],
        ['name' => 'social.posts.edit', 'description' => 'Edit post', 'is_default' => true],
        ['name' => 'social.posts.update', 'description' => 'Update post', 'is_default' => true],
        ['name' => 'social.posts.destroy', 'description' => 'Delete post', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Posts', 'icon' => 'users', 'route' => 'social.posts.index', 'order_index' => 1003, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'Social';
};
