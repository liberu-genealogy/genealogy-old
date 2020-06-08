<?php

use LaravelEnso\Migrator\App\Database\Migration;

class CreateStructureForTreesParent extends Migration
{
    protected $menu = [
        'name' => 'Trees', 'icon' => 'book', 'route' => null, 'order_index' => 999, 'has_children' => true,
    ];
}