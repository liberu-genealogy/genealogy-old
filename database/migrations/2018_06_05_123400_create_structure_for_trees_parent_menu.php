<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForTreesParentMenu extends StructureMigration
{

    protected $menu = [
        'name' => 'Trees', 'icon' => 'tachometer-alt', 'link' => null, 'order_index' => 999, 'has_children' => true,
    ];

}
