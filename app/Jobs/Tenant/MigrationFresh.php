<?php

namespace App\Jobs\Tenant;

use App\Service\Tenant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;
use LaravelLiberu\Companies\Models\Company;
use LaravelLiberu\Multitenancy\Enums\Connections;

class MigrationFresh implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private readonly Company $tenant)
    {
        // $this->queue = 'sync';
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Tenant::set($this->tenant);
        $company = Tenant::get();

        Artisan::call('migrate:fresh', [
            '--database' => $company,
            '--path' => '/database/migrations/tenant',
            '--force' => true,
        ]);
    }
}
