<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForTrees extends Migration
{
    protected array $permissions = [
        ['name' => 'trees.show', 'description' => 'Show tree', 'is_default' => true],
        // ['name' => 'trees.index', 'description' => 'Index tree', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Show', 'icon' => 'eye', 'route' => 'trees.show', 'order_index' => 999, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'Trees';
}
