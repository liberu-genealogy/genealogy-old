<?php

namespace App\Jobs\Tenant;

use App\Models\enso\companies\Company;
use App\Service\Tenant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use LaravelEnso\Multitenancy\Traits\ConnectionStoragePath;

class ClearStrg implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, ConnectionStoragePath;

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
        Tenant::set($this->tenant);

        Storage::deleteDirectory($this->tenantPath());
    }
}
