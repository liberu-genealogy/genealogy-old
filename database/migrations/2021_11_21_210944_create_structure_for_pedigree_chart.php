<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStructureForPedigreeChart extends Migration
{
    protected array $permissions = [
        ['name' => 'pedigree.index', 'description' => 'Show index for tree', 'is_default' => true],

        ['name' => 'tree.show', 'description' => 'show tree', 'is_default' => true],
        ['name' => 'tree.store', 'description' => 'Store a new tree', 'is_default' => true],

    ];

    protected array $menu = [
        'name' => 'pedigree-chart', 'icon' => 'users', 'route' => 'pedigree.show', 'order_index' => 999, 'has_children' => false,
        // 'name' => 'Fan-chart', 'icon' => 'users', 'route' => 'tree.show', 'order_index' => 999, 'has_children' => false,
        // 'name' => 'Decendent-chart', 'icon' => 'users', 'route' => 'tree.show', 'order_index' => 999, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'Trees';
}
