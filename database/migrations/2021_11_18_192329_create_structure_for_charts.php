<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForCharts extends Migration
{
    protected array $permissions = [
        ['name' => 'tree.index', 'description' => 'Show index for tree', 'is_default' => true],

        ['name' => 'tree.show', 'description' => 'show tree', 'is_default' => true],
        ['name' => 'tree.store', 'description' => 'Store a new tree', 'is_default' => true],
     
    ];

    protected array $menu = [
        'name' => 'Decendent', 'icon' => 'users', 'route' => 'tree.show', 'order_index' => 999, 'has_children' => false,
        // 'name' => 'Fan-chart', 'icon' => 'users', 'route' => 'tree.show', 'order_index' => 999, 'has_children' => false,
        // 'name' => 'Decendent-chart', 'icon' => 'users', 'route' => 'tree.show', 'order_index' => 999, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'Trees';
}
