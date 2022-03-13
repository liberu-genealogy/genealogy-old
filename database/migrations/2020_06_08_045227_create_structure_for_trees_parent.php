<?php

use LaravelEnso\Migrator\Database\Migration;

return new class extends Migration
{
    protected array $menu = [
        'name' => 'Trees', 'icon' => 'book', 'route' => null, 'order_index' => 799, 'has_children' => true,
    ];
};
