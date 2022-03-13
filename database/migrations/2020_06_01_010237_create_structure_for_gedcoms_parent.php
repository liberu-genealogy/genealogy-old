<?php

use LaravelEnso\Migrator\Database\Migration;

return new class extends Migration
{
    protected array $menu = [
        'name' => 'Gedcom', 'icon' => 'street-view', 'route' => null, 'order_index' => 790, 'has_children' => true,
    ];
};
