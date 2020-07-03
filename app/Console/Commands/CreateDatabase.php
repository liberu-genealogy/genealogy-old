<?php

namespace App\Console\Commands;

use App\Jobs\Tenant\CreateDB as Job;
use LaravelEnso\Companies\Models\Company;
use LaravelEnso\Multitenancy\Commands\Tenant;

class CreateDatabase extends Tenant
{
    protected $signature = 'enso:tenant:create-database {--all=false} {--tenantId}';

    protected $description = 'Creates tenant database';

    public function dispatch(Company $company): void
    {
        $this->line(__('Creating database for company :company', ['company' => $company->name]));

        Job::dispatch($company);
    }
}
