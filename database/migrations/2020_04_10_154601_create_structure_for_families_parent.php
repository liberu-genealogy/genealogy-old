<?php

use LaravelLiberu\Migrator\Database\Migration;

return new class extends Migration
{
    protected array $menu = [
        'name' => 'Family', 'icon' => 'book', 'route' => null, 'order_index' => 796, 'has_children' => true,
    ];
};
