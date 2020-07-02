<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForFiles extends Migration
{
    protected array $permissions = [
        ['name' => 'core.files.index', 'description' => 'List files', 'is_default' => true],
        ['name' => 'core.files.link', 'description' => 'Get file download temporary link', 'is_default' => true],
        ['name' => 'core.files.show', 'description' => 'Open file in browser', 'is_default' => true],
        ['name' => 'core.files.download', 'description' => 'Download file', 'is_default' => true],
        ['name' => 'core.files.destroy', 'description' => 'Delete file', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Files', 'icon' => 'folder-open', 'route' => 'core.files.index', 'order_index' => 255, 'has_children' => false,
    ];
}
