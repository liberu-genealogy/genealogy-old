<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForGedcoms extends Migration
{
    protected array $permissions = [
        ['name' => 'gedcom.index', 'description' => 'Show index for gedcoms', 'is_default' => true],
        ['name' => 'gedcom.create', 'description' => 'Create gedcom', 'is_default' => true],
        ['name' => 'gedcom.store', 'description' => 'Store a new gedcom', 'is_default' => true],
        ['name' => 'gedcom.show', 'description' => 'Show gedcom', 'is_default' => true],
        ['name' => 'gedcom.edit', 'description' => 'Edit gedcom', 'is_default' => true],
        ['name' => 'gedcom.update', 'description' => 'Update gedcom', 'is_default' => true],
        ['name' => 'gedcom.destroy', 'description' => 'Delete gedcom', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Gedcom Import', 'icon' => 'cloud-upload-alt', 'route' => 'gedcom.index', 'order_index' => 801, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'Gedcom';
}
