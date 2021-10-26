<?php

namespace App\Jobs\Tenant;

use App\Service\Tenant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use LaravelEnso\Companies\Models\Company;
use LaravelEnso\Multitenancy\Traits\TenantResolver;

class CreateDB implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, TenantResolver;
    private $tenant;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Company $tenant)
    {
        //
        $this->tenant = $tenant;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        Tenant::set($this->tenant);
        DB::statement('CREATE DATABASE '.$this->tenantDatabase());
    }
}
