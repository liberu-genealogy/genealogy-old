<?php

namespace App\Jobs\Tenant;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;
use LaravelEnso\Companies\App\Models\Company;
use LaravelEnso\Multitenancy\App\Enums\Connections;
use LaravelEnso\Multitenancy\App\Services\Tenant;

class Migration implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
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

        // $this->queue = 'sync';
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

        Artisan::call('migrate', [
            '--database' => Connections::Tenant,
            '--path' => '/database/migrations/tenant',
            '--force' => true,
        ]);
        Artisan::call('db:seed', [
            '--database' => Connections::Tenant,
            '--force' => true,
        ]);
    }
}
