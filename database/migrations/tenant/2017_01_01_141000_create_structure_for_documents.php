<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForDocuments extends Migration
{
    protected array $permissions = [
        ['name' => 'core.documents.store', 'description' => 'Upload documents', 'is_default' => false],
        ['name' => 'core.documents.index', 'description' => 'List documents for documentable', 'is_default' => false],
        ['name' => 'core.documents.destroy', 'description' => 'Delete document', 'is_default' => false],
    ];
}
