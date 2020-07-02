<?php

namespace App\Console\Commands;

use App\Jobs\Tenant\ClearStrg as Job;
use LaravelEnso\Companies\Models\Company;
use LaravelEnso\Multitenancy\Commands\Tenant;

class ClearStorage extends Tenant
{
    protected $signature = 'enso:tenant:clear-storage {--all=false} {--tenantId}';

    protected $description = 'Clears tenant storage';

    public function dispatch(Company $company): void
    {
        $this->line(__('Clearing storage for company :company', ['company' => $company->name]));

        Job::dispatch($company);
    }
}
