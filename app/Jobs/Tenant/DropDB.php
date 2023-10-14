<?php

namespace App\Jobs\Tenant;

use App\Models\Company;
use App\Service\Tenant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use LaravelLiberu\Multitenancy\Traits\TenantResolver;

class DropDB implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, TenantResolver;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private readonly Company $tenant)
    {
        // $this->queue = 'light';
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Tenant::set($this->tenant);

        DB::statement('DROP DATABASE '.$this->tenantDatabase());
    }
}
