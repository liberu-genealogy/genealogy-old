<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForSubscription extends Migration
{
    protected array $permissions = [
        ['name' => 'subscription.index', 'description' => 'Subscription page', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Subscription', 'icon' => 'credit-card', 'route' => 'subscription.index', 'order_index' => 100, 'has_children' => false,
    ];
}
