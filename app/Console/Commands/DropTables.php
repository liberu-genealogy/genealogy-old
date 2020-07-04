<?php

namespace App\Console\Commands;

use App\Jobs\Tenant\DropTb as Job;
use LaravelEnso\Companies\Models\Company;
use LaravelEnso\Multitenancy\Commands\Tenant;

class DropTables extends Tenant
{
    protected $signature = 'enso:tenant:drop-tables {--all=false} {--tenantId}';

    protected $description = 'Drops all tables from tenant database(s)';

    public function dispatch(Company $company): void
    {
        $this->line(__('Dropping tables for company :company', ['company' => $company->name]));

        Job::dispatch($company);
    }
}
