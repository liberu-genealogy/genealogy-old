<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForTrees extends Migration
{
    protected $permissions = [
        ['name' => 'trees.show', 'description' => 'Show tree', 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Show', 'icon' => 'eye', 'route' => 'trees.show', 'order_index' => 999, 'has_children' => false,
    ];

    protected $parentMenu = 'Trees';
}
