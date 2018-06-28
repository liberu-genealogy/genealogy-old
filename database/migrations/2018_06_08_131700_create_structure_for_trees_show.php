<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForTreesShow extends StructureMigration
{
    protected $permissions = [
        ['name' => 'trees.show', 'description' => 'Show tree', 'type' => 0, 'is_default' => false],
    ];

    protected $permissionGroup = [
        'name' => 'trees', 'description' => 'Trees group',
    ];

    protected $menu = [
        'name' => 'Show', 'icon' => 'object-group', 'link' => 'trees.show', 'order_index' => 999, 'has_children' => false,
    ];

    protected $parentMenu = 'Trees';
}
