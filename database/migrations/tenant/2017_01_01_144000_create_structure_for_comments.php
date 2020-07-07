<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForComments extends Migration
{
    protected array $permissions = [
        ['name' => 'core.comments.users', 'description' => 'Get taggable users options for select', 'is_default' => true],
        ['name' => 'core.comments.index', 'description' => 'List comments for commentable', 'is_default' => true],
        ['name' => 'core.comments.store', 'description' => 'Create comment', 'is_default' => true],
        ['name' => 'core.comments.update', 'description' => 'Update edited comment', 'is_default' => true],
        ['name' => 'core.comments.destroy', 'description' => 'Delete comment', 'is_default' => true],
    ];
}
