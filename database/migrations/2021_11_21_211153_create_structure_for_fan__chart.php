<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForFanChart extends Migration
{
    protected array $permissions = [
        ['name' => 'fanchart.show', 'description' => 'show tree', 'is_default' => true],
        // ['name' => 'decendent.index', 'description' => 'show tree', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Fan Chart', 'icon' => 'users', 'route' => 'fanchart.show', 'order_index' => 999, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'Trees';
}
