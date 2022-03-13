<?php

use LaravelEnso\Migrator\Database\Migration;

return new class extends Migration
{
    protected array $menu = [
        'name' => 'Dna', 'icon' => 'book', 'route' => null, 'order_index' => 796, 'has_children' => true,
    ];
};
