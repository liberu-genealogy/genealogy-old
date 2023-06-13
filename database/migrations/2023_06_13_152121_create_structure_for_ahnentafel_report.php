<?php

use LaravelEnso\Migrator\Database\Migration;

return new class extends Migration
{
    protected array $permissions = [
        ['name' => 'reports.ahnentafel', 'description' => 'View Ahnentafel report', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Ahnentafel', 'icon' => 'eye', 'route' => 'reports.ahnentafel', 'order_index' => 1000, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'Reports';
};
