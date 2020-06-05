<?php

use LaravelEnso\Migrator\App\Database\Migration;

class CreateStructureForGedcoms extends Migration
{
    protected $permissions = [
        ['name' => 'gedcom.index', 'description' => 'Show index for gedcoms', 'is_default' => false],

        ['name' => 'gedcom.create', 'description' => 'Create gedcom', 'is_default' => false],
        ['name' => 'gedcom.store', 'description' => 'Store a new gedcom', 'is_default' => false],
        ['name' => 'gedcom.show', 'description' => 'Show gedcom', 'is_default' => false],
        ['name' => 'gedcom.edit', 'description' => 'Edit gedcom', 'is_default' => false],
        ['name' => 'gedcom.update', 'description' => 'Update gedcom', 'is_default' => false],
        ['name' => 'gedcom.destroy', 'description' => 'Delete gedcom', 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Gedcom Import', 'icon' => 'cloud-upload-alt', 'route' => 'gedcom.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected $parentMenu = '';
}
