<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForNotes extends StructureMigration
{
    protected $permissions = [
        ['name' => 'note.index', 'description' => 'Show index for note', 'type' => 0, 'is_default' => false],
        ['name' => 'note.create', 'description' => 'Create note', 'type' => 1, 'is_default' => false],
        ['name' => 'note.store', 'description' => 'Store a new note', 'type' => 1, 'is_default' => false],
        ['name' => 'note.show', 'description' => 'Show note', 'type' => 1, 'is_default' => false],
        ['name' => 'note.edit', 'description' => 'Edit note', 'type' => 1, 'is_default' => false],
        ['name' => 'note.update', 'description' => 'Update note', 'type' => 1, 'is_default' => false],
        ['name' => 'note.destroy', 'description' => 'Delete note', 'type' => 1, 'is_default' => false],
        ['name' => 'note.initTable', 'description' => 'Init table for note', 'type' => 0, 'is_default' => false],
        ['name' => 'note.tableData', 'description' => 'Get table data for note', 'type' => 0, 'is_default' => false],
        ['name' => 'note.exportExcel', 'description' => 'Export excel for note', 'type' => 0, 'is_default' => false],
        ['name' => 'note.options', 'description' => 'Get note options for select', 'type' => 0, 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Notes', 'icon' => 'book', 'route' => 'note.index', 'order_index' => 999, 'has_children' => false
    ];

    protected $parentMenu = '';
}

