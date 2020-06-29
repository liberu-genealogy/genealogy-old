<?php

namespace App\Console\Commands;

use LaravelEnso\Companies\App\Models\Company;
use App\Jobs\Tenant\DropDB as Job;
use LaravelEnso\Multitenancy\App\Commands\Tenant;

class DropDatabase extends Tenant
{
    protected $signature = 'enso:tenant:drop-database {--all=false} {--tenantId}';

    protected $description = 'Drops tenant database(s)';

    public function dispatch(Company $company): void
    {
        $this->line(__('Dropping database for company :company', ['company' => $company->name]));

        Job::dispatch($company);
    }
}
