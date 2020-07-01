<?php

use LaravelEnso\Migrator\App\Database\Migration;

class CreateStructureForFiles extends Migration
{
    protected $permissions = [
        ['name' => 'core.files.index', 'description' => 'List files', 'is_default' => true],
        ['name' => 'core.files.link', 'description' => 'Get file download temporary link', 'is_default' => true],
        ['name' => 'core.files.show', 'description' => 'Open file in browser', 'is_default' => true],
        ['name' => 'core.files.download', 'description' => 'Download file', 'is_default' => true],
        ['name' => 'core.files.destroy', 'description' => 'Delete file', 'is_default' => true],
    ];

    protected $menu = [
        'name' => 'Files', 'icon' => 'folder-open', 'route' => 'core.files.index', 'order_index' => 255, 'has_children' => false,
    ];
}
