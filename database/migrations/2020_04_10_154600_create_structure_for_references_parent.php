<?php

use LaravelEnso\Migrator\Database\Migration;

return new class extends Migration
{
    protected array $menu = [
        'name' => 'References', 'icon' => 'book', 'route' => null, 'order_index' => 798, 'has_children' => true,
    ];
};
