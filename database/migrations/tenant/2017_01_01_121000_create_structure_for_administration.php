<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForAdministration extends Migration
{
    protected $menu = [
        'name' => 'Administration', 'icon' => 'cogs', 'route' => null, 'order_index' => 500, 'has_children' => true,
    ];
}
