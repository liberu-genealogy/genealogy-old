<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForPedigreeChart extends Migration
{
    protected array $permissions = [
        ['name' => 'pedigree.show', 'description' => 'show tree', 'is_default' => true],
        // ['name' => 'decendent.index', 'description' => 'show tree', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Pedigree Chart', 'icon' => 'users', 'route' => 'pedigree.show', 'order_index' => 999, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'Trees';
}
