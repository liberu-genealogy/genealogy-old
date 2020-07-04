<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForSourcesParent extends Migration
{
    protected array $menu = [
        'name' => 'Sources', 'icon' => 'book', 'route' => null, 'order_index' => 792, 'has_children' => true,
    ];
}
