<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForTreesEdge extends StructureMigration
{
    protected $permissions = [
        ['name' => 'trees.edge', 'description' => 'Lists connections', 'type' => 0, 'is_default' => false],
    ];

    protected $permissionGroup = [
        'name' => 'trees', 'description' => 'Trees group',
    ];

    protected $menu = [
        'name' => 'Edge', 'icon' => 'tachometer-alt', 'link' => 'trees.edge', 'order_index' => 999, 'has_children' => false,

    ];

    protected $parentMenu = 'Trees';
}
