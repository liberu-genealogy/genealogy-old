<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForCharts extends Migration
{
    protected array $permissions = [
        ['name' => 'decendent.show', 'description' => 'show tree', 'is_default' => true],
        // ['name' => 'decendent.index', 'description' => 'show tree', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Decendent Chart', 'icon' => 'users', 'route' => 'decendent.show', 'order_index' => 999, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'Trees';
}
