<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForLocalisation extends Migration
{
    protected array $permissions = [
        ['name' => 'system.localisation.index', 'description' => 'Localisation index', 'is_default' => false],
        ['name' => 'system.localisation.initTable', 'description' => 'Init table data for localisation', 'is_default' => false],
        ['name' => 'system.localisation.tableData', 'description' => 'Get table data for localisation', 'is_default' => false],
        ['name' => 'system.localisation.exportExcel', 'description' => 'Export excel for localisation', 'is_default' => false],
        ['name' => 'system.localisation.create', 'description' => 'Create langugage', 'is_default' => false],
        ['name' => 'system.localisation.edit', 'description' => 'Edit language', 'is_default' => false],
        ['name' => 'system.localisation.editTexts', 'description' => 'Edit lang file', 'is_default' => false],
        ['name' => 'system.localisation.addKey', 'description' => 'Add new lang key', 'is_default' => false],
        ['name' => 'system.localisation.merge', 'description' => 'Merge one or all the json lang files', 'is_default' => false],
        ['name' => 'system.localisation.getLangFile', 'description' => 'Get selected lang file content', 'is_default' => false],
        ['name' => 'system.localisation.saveLangFile', 'description' => 'Save edited lang file', 'is_default' => false],
        ['name' => 'system.localisation.store', 'description' => 'Save newly created language', 'is_default' => false],
        ['name' => 'system.localisation.update', 'description' => 'Save edited language', 'is_default' => false],
        ['name' => 'system.localisation.destroy', 'description' => 'Delete language', 'is_default' => false],
    ];

    protected array $menu = [
        'name' => 'Localisation', 'icon' => 'language', 'route' => 'system.localisation.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'System';
}
