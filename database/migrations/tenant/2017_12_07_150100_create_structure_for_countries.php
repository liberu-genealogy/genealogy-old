<?php

use LaravelEnso\Migrator\App\Database\Migration;

class CreateStructureForCountries extends Migration
{
    protected $permissions = [
        ['name' => 'core.countries.options', 'description' => 'Get country options for select', 'is_default' => false],
    ];
}
