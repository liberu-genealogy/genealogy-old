<?php

use LaravelEnso\Migrator\Database\Migration;

return new class extends Migration
{
    protected array $menu = [
        'name' => 'People', 'icon' => 'book', 'route' => null, 'order_index' => 794, 'has_children' => true,
    ];
};
