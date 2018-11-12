<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForTreesPedigree extends StructureMigration
{
    protected $permissions = [
        ['name' => 'trees.pedigree', 'description' => 'Lists connections', 'type' => 0, 'is_default' => false],
    ];

    protected $permissionGroup = [
        'name' => 'trees', 'description' => 'Trees group',
    ];

    protected $menu = [
        'name' => 'Pedigree', 'icon' => 'book', 'route' => 'trees.pedigree', 'order_index' => 999, 'has_children' => false,
    ];

    protected $parentMenu = 'Trees';
}
