<?php

namespace App\Jobs\Tenant;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use LaravelEnso\Companies\App\Models\Company;
use LaravelEnso\Multitenancy\App\Services\Tenant;
use LaravelEnso\Multitenancy\App\Traits\TenantResolver;

class DropDB implements ShouldQueue
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
        $this->tenant = $tenant;

        // $this->queue = 'light';
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

        DB::statement('DROP DATABASE '.$this->tenantDatabase());
    }
}
