<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForUploads extends Migration
{
    protected array $permissions = [
        ['name' => 'core.uploads.store', 'description' => 'Upload file', 'is_default' => true],
        ['name' => 'core.uploads.destroy', 'description' => 'Delete upload', 'is_default' => true],
    ];
}
