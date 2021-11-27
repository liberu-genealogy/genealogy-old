<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStructureForFanChart extends Migration
{
    protected array $permissions = [
        ['name' => 'fan.index', 'description' => 'Show index for tree', 'is_default' => true],

        ['name' => 'fan.show', 'description' => 'show tree', 'is_default' => true],
        ['name' => 'fan.store', 'description' => 'Store a new tree', 'is_default' => true],
     
    ];

    protected array $menu = [
        // 'name' => 'Pidegree-chart', 'icon' => 'users', 'route' => 'tree.show', 'order_index' => 999, 'has_children' => false,
        'name' => 'Fan-chart', 'icon' => 'users', 'route' => 'tree.show', 'order_index' => 999, 'has_children' => false,
        // 'name' => 'Decendent-chart', 'icon' => 'users', 'route' => 'tree.show', 'order_index' => 999, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'Trees';
}
