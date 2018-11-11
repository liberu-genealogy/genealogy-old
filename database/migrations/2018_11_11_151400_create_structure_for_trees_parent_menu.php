<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForTreesParentMenu extends StructureMigration
{
    protected $menu = [
        'name' => 'Trees', 'icon' => 'book', 'route' => null, 'order_index' => 999, 'has_children' => true,
    ];
}
