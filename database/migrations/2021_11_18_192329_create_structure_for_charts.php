<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForCharts extends Migration
{
    protected array $permissions = [

    ];

    protected array $menu = [
<<<<<<< HEAD
        'name' => 'Decendent', 'icon' => 'users', 'route' => 'tree.show', 'order_index' => 999, 'has_children' => false,
        // 'name' => 'Fan-chart', 'icon' => 'users', 'route' => 'tree.show', 'order_index' => 999, 'has_children' => false,
        // 'name' => 'Decendent-chart', 'icon' => 'users', 'route' => 'tree.show', 'order_index' => 999, 'has_children' => false,
=======
        'name' => 'Pedigree Chart', 'icon' => 'users', 'route' => 'tree.show', 'order_index' => 999, 'has_children' => false,
        'name' => 'Fan Chart', 'icon' => 'users', 'route' => 'tree.show', 'order_index' => 999, 'has_children' => false,
        'name' => 'Decendent Chart', 'icon' => 'users', 'route' => 'tree.show', 'order_index' => 999, 'has_children' => false,
>>>>>>> master
    ];

    protected ?string $parentMenu = 'Trees';
}
