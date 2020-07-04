<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForCompanyPeople extends Migration
{
    protected array $permissions = [
        ['name' => 'administration.companies.people.create', 'description' => 'Add person to company', 'is_default' => false],
        ['name' => 'administration.companies.people.edit', 'description' => 'Edit existing company person', 'is_default' => false],
        ['name' => 'administration.companies.people.index', 'description' => 'Show company people', 'is_default' => false],
        ['name' => 'administration.companies.people.store', 'description' => 'Save newly added company person', 'is_default' => false],
        ['name' => 'administration.companies.people.update', 'description' => 'Update edited company person', 'is_default' => false],
        ['name' => 'administration.companies.people.destroy', 'description' => 'Delete company person', 'is_default' => false],
    ];
}
