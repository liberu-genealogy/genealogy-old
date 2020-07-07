<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForDiscussions extends Migration
{
    protected array $permissions = [
        ['name' => 'core.discussions.index', 'description' => 'Show index for discussion', 'is_default' => true],
        ['name' => 'core.discussions.store', 'description' => 'Store a new discussion', 'is_default' => true],
        ['name' => 'core.discussions.show', 'description' => 'Show discussion', 'is_default' => true],
        ['name' => 'core.discussions.update', 'description' => 'Update discussion', 'is_default' => true],
        ['name' => 'core.discussions.destroy', 'description' => 'Delete discussion', 'is_default' => true],
        ['name' => 'core.discussions.storeReply', 'description' => 'Store a new reply', 'is_default' => true],
        ['name' => 'core.discussions.updateReply', 'description' => 'Update reply', 'is_default' => true],
        ['name' => 'core.discussions.destroyReply', 'description' => 'Delete reply', 'is_default' => true],
        ['name' => 'core.discussions.react', 'description' => 'React on reactable', 'is_default' => true],
    ];
}
