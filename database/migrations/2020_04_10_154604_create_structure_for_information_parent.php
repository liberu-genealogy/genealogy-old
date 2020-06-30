<?php

use LaravelEnso\Migrator\App\Database\Migration;

class CreateStructureForInformationParent extends Migration
{
    protected $menu = [
        'name' => 'Information', 'icon' => 'book', 'route' => null, 'order_index' => 790, 'has_children' => true,
    ];
}
