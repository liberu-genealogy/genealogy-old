<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForCompanies extends Migration
{
    protected array $permissions = [
        ['name' => 'administration.companies.initTable', 'description' => 'Init table for companies', 'is_default' => false],
        ['name' => 'administration.companies.tableData', 'description' => 'Get table data for companies', 'is_default' => false],
        ['name' => 'administration.companies.exportExcel', 'description' => 'Export excel for companies', 'is_default' => false],
        ['name' => 'administration.companies.options', 'description' => 'Get options for select', 'is_default' => false],
        ['name' => 'administration.companies.create', 'description' => 'Create company', 'is_default' => false],
        ['name' => 'administration.companies.edit', 'description' => 'Edit existing company', 'is_default' => false],
        ['name' => 'administration.companies.index', 'description' => 'Show companies', 'is_default' => false],
        ['name' => 'administration.companies.store', 'description' => 'Store newly created company', 'is_default' => false],
        ['name' => 'administration.companies.update', 'description' => 'Update edited company', 'is_default' => false],
        ['name' => 'administration.companies.destroy', 'description' => 'Delete company', 'is_default' => false],
    ];

    protected array $menu = [
        'name' => 'Companies', 'icon' => 'building', 'route' => 'administration.companies.index', 'order_index' => 250, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'Administration';
}
