<?php

use LaravelEnso\Migrator\App\Database\Migration;

class CreateStructureForPreferences extends Migration
{
    protected $permissions = [
        ['name' => 'core.preferences.store', 'description' => "Set user's preferences", 'is_default' => true],
        ['name' => 'core.preferences.reset', 'description' => 'Reset preferences to default', 'is_default' => true],
    ];
}
