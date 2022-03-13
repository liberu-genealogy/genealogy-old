<?php

use LaravelEnso\Migrator\Database\Migration;

return new class extends Migration
{
    protected array $menu = [
        'name' => 'Sources', 'icon' => 'book', 'route' => null, 'order_index' => 792, 'has_children' => true,
    ];
};
