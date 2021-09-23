<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForSubscription extends Migration
{
    protected array $permissions = [
        ['name' => 'subscription.index', 'description' => 'Show index for subscriptions', 'is_default' => true],

        ['name' => 'subscription.stripe.index', 'description' => 'Payment for Stripe', 'is_default' => true],
        ['name' => 'subscription.paypal.index', 'description' => 'Payment for PayPal', 'is_default' => true],

        ['name' => 'subscription.create', 'description' => 'Create subscription', 'is_default' => true],
        ['name' => 'subscription.store', 'description' => 'Store a new subscription', 'is_default' => true],
        ['name' => 'subscription.show', 'description' => 'Show subscription', 'is_default' => true],
        ['name' => 'subscription.edit', 'description' => 'Edit subscription', 'is_default' => true],
        ['name' => 'subscription.update', 'description' => 'Update subscription', 'is_default' => true],
        ['name' => 'subscription.destroy', 'description' => 'Delete subscription', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Subscription', 'icon' => 'credit-card', 'route' => 'subscription.index', 'order_index' => 801, 'has_children' => false,
    ];
}
