<?php

namespace App\Console\Commands;

use App\Jobs\Tenant\Migration as Job;
use Illuminate\Console\Command;
use LaravelEnso\Companies\Models\Company;
use LaravelEnso\Multitenancy\Commands\Tenant;

class Migrate extends Tenant
{
    protected $signature = 'enso:tenant:migrate {--all=false} {--tenantId}';

    protected $description = 'Performs tenant(s) migrations';

    public function dispatch(Company $company): void
    {
        $this->line(__('Migrating tables for company :company', ['company' => $company->name]));

        Job::dispatch($company);
    }
}
