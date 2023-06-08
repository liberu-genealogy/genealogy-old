<?php

use LaravelEnso\Migrator\Database\Migration;

return new class extends Migration
{
    protected array $permissions = [
        ['name' => 'reports.index', 'description' => 'Reports', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Reports', 'icon' => 'book', 'route' => '', 'order_index' => 799, 'has_children' => true,
    ];
};
