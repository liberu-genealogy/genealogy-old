<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForGedcom extends StructureMigration
{
    protected $permissionGroup = [
        'name' => 'gedcom', 'description' => 'Gedcom permissions group',
    ];

    protected $permissions = [
        ['name' => 'gedcom.index', 'description' => 'Gedcom page', 'type' => 0, 'is_default' => false],
        ['name' => 'gedcom.store', 'description' => 'Gedcom post', 'type' => 1, 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Gedcom', 'icon' => 'book', 'route' => 'gedcom.index', 'order_index' => 999, 'has_children' => false
    ];
}
