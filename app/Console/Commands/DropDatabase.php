<?php

namespace App\Console\Commands;

use App\Jobs\Tenant\DropDB as Job;
use LaravelEnso\Companies\Models\Company;
use LaravelEnso\Multitenancy\Commands\Tenant;

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
