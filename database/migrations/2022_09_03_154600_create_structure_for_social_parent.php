<?php

use LaravelEnso\Migrator\Database\Migration;

return new class extends Migration
{
    protected array $menu = [
        'name' => 'Social', 'icon' => 'book', 'route' => null, 'order_index' => 1000, 'has_children' => true,
    ];
};
