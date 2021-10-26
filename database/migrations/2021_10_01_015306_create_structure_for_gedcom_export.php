<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForGedcomExport extends Migration
{
    protected array $permissions = [
        ['name' => 'gedcomexport.index', 'description' => 'Show index for gedcom export', 'is_default' => true],
        ['name' => 'gedcomexport.create', 'description' => 'Create gedcom export', 'is_default' => true],
        ['name' => 'gedcomexport.store', 'description' => 'Store a new gedcom export', 'is_default' => true],
        ['name' => 'gedcomexport.show', 'description' => 'Show gedcom export', 'is_default' => true],
        ['name' => 'gedcomexport.edit', 'description' => 'Edit gedcom export', 'is_default' => true],
        ['name' => 'gedcomexport.update', 'description' => 'Update gedcom export', 'is_default' => true],
        ['name' => 'gedcomexport.destroy', 'description' => 'Delete gedcom export', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Gedcom export', 'icon' => 'file', 'route' => 'gedcomexport.index', 'order_index' => 801, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'Gedcom';
}
