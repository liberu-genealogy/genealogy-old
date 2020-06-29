<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use LaravelEnso\Companies\App\Models\Company;
use App\Jobs\Tenant\Migration as Job;
use LaravelEnso\Multitenancy\App\Commands\Tenant;

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
