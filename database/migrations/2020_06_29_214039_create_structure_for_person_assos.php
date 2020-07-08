<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForPersonAssos extends Migration
{
    protected array $permissions = [
        ['name' => 'personasso.index', 'description' => 'Show index for person assos', 'is_default' => true],

        ['name' => 'personasso.create', 'description' => 'Create person asso', 'is_default' => true],
        ['name' => 'personasso.store', 'description' => 'Store a new person asso', 'is_default' => true],
        ['name' => 'personasso.show', 'description' => 'Show person asso', 'is_default' => true],
        ['name' => 'personasso.edit', 'description' => 'Edit person asso', 'is_default' => true],
        ['name' => 'personasso.update', 'description' => 'Update person asso', 'is_default' => true],
        ['name' => 'personasso.destroy', 'description' => 'Delete person asso', 'is_default' => true],
        ['name' => 'personasso.initTable', 'description' => 'Init table for person assos', 'is_default' => true],

        ['name' => 'personasso.tableData', 'description' => 'Get table data for person assos', 'is_default' => true],

        ['name' => 'personasso.exportExcel', 'description' => 'Export excel for person assos', 'is_default' => true],

        ['name' => 'personasso.options', 'description' => 'Get person asso options for select', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Person Association', 'icon' => 'book', 'route' => 'personasso.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'People';
}
