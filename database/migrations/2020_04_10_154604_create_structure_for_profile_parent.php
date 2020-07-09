<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForProfileParent extends Migration
{
    protected array $menu = [
        'name' => 'Profile', 'icon' => 'book', 'route' => null, 'order_index' => 790, 'has_children' => true,
    ];
}
