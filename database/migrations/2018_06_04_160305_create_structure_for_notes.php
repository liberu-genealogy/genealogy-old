<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForNotes extends StructureMigration
{
    protected $permissions = [
        ['name' => 'notes.index', 'description' => 'notes index', 'type' => 0, 'is_default' => false],
        ['name' => 'notes.create', 'description' => 'Get create form  for notes', 'type' => 0, 'is_default' => false],
        ['name' => 'notes.edit', 'description' => 'Get edit form for notes', 'type' => 0, 'is_default' => false],
        ['name' => 'notes.update', 'description' => 'Update edited note', 'type' => 1, 'is_default' => false],
        ['name' => 'notes.store', 'description' => 'Store newly created note', 'type' => 1, 'is_default' => false],
        ['name' => 'notes.destroy', 'description' => 'Delete note', 'type' => 1, 'is_default' => false],
        ['name' => 'notes.initTable', 'description' => 'Init table for notes', 'type' => 0, 'is_default' => false],
        ['name' => 'notes.getTableData', 'description' => 'Get table data for notes', 'type' => 0, 'is_default' => false],
        ['name' => 'notes.exportExcel', 'description' => 'Export excel for notes', 'type' => 0, 'is_default' => false],
        ['name' => 'notes.selectOptions', 'description' => 'Get note list for vue select', 'type' => 0, 'is_default' => false],
        ['name' => 'notes.show', 'description' => 'Show note', 'type' => 0, 'is_default' => false],
    ];

    protected $permissionGroup = [
        'name' => 'notes', 'description' => 'Notes group',
    ];

    protected $menu = [
        'name' => 'Notes', 'icon' => 'tachometer-alt', 'link' => 'notes.index', 'order_index' => 999, 'has_children' => false,
    ];
}
