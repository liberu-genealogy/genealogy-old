<?php

use LaravelEnso\Migrator\Database\Migration;

return new class extends Migration
{
    protected array $permissions = [
        ['name' => 'social.topics.index', 'description' => 'Show index for topics', 'is_default' => true],
        ['name' => 'social.topics.create', 'description' => 'Create topic', 'is_default' => true],
        ['name' => 'social.topics.store', 'description' => 'Store a new topic', 'is_default' => true],
        ['name' => 'social.topics.edit', 'description' => 'Edit topic', 'is_default' => true],
        ['name' => 'social.topics.update', 'description' => 'Update topic', 'is_default' => true],
        ['name' => 'social.topics.destroy', 'description' => 'Delete topic', 'is_default' => true],
        ['name' => 'social.topics.initTable', 'description' => 'Init table for topics', 'is_default' => true],
        ['name' => 'social.topics.tableData', 'description' => 'Get table data for topics', 'is_default' => true],
        ['name' => 'social.topics.exportExcel', 'description' => 'Export excel for topics', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Topic', 'icon' => 'users', 'route' => 'social.topics.index', 'order_index' => 1002, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'Social';
};
