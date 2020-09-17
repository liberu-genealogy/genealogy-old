<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForNotes extends Migration
{
    protected array $permissions = [
        ['name' => 'notes.index', 'description' => 'Show index for notes', 'is_default' => true],

        ['name' => 'notes.create', 'description' => 'Create note', 'is_default' => true],
        ['name' => 'notes.store', 'description' => 'Store a new note', 'is_default' => true],
        ['name' => 'notes.show', 'description' => 'Show note', 'is_default' => true],
        ['name' => 'notes.edit', 'description' => 'Edit note', 'is_default' => true],
        ['name' => 'notes.update', 'description' => 'Update note', 'is_default' => true],
        ['name' => 'notes.destroy', 'description' => 'Delete note', 'is_default' => true],
        ['name' => 'notes.initTable', 'description' => 'Init table for notes', 'is_default' => true],

        ['name' => 'notes.tableData', 'description' => 'Get table data for notes', 'is_default' => true],

        ['name' => 'notes.exportExcel', 'description' => 'Export excel for notes', 'is_default' => true],

        ['name' => 'notes.options', 'description' => 'Get note options for select', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Notes', 'icon' => 'users', 'route' => 'notes.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'References';
}
