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
        'name' => 'Charts', 'icon' => 'users', 'route' => 'tree.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'Trees';
}
