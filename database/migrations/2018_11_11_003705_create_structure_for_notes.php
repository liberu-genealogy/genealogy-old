<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForNotes extends StructureMigration
{
    protected $permissions = [
        ['name' => 'note.index', 'description' => 'Show index for notes', 'type' => 0, 'is_default' => false],
        ['name' => 'note.create', 'description' => 'Create notes', 'type' => 1, 'is_default' => false],
        ['name' => 'note.store', 'description' => 'Store a new notes', 'type' => 1, 'is_default' => false],
        ['name' => 'note.show', 'description' => 'Show notes', 'type' => 1, 'is_default' => false],
        ['name' => 'note.edit', 'description' => 'Edit notes', 'type' => 1, 'is_default' => false],
        ['name' => 'note.update', 'description' => 'Update notes', 'type' => 1, 'is_default' => false],
        ['name' => 'note.destroy', 'description' => 'Delete notes', 'type' => 1, 'is_default' => false],
        ['name' => 'note.initTable', 'description' => 'Init table for notes', 'type' => 0, 'is_default' => false],
        ['name' => 'note.tableData', 'description' => 'Get table data for notes', 'type' => 0, 'is_default' => false],
        ['name' => 'note.exportExcel', 'description' => 'Export excel for notes', 'type' => 0, 'is_default' => false],
        ['name' => 'note.options', 'description' => 'Get notes options for select', 'type' => 0, 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Notes', 'icon' => 'book', 'route' => 'note.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected $parentMenu = '';
}
