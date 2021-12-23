<?php

namespace App\Jobs\Tenant;

use App\Models\User;
use App\Person;
use App\Service\Tenant;
use DB;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use LaravelEnso\Companies\Models\Company;
use LaravelEnso\Multitenancy\Enums\Connections;
use LaravelEnso\Roles\Models\Role;
use LaravelEnso\UserGroups\Models\UserGroup;
use Str;

class MigrationFresh implements ShouldQueue
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
        $company = Tenant::get();
        $db = Connections::Tenant.$company->id;

        Artisan::call('migrate:fresh', [
            '--database' => $company,
            '--path' => '/database/migrations/tenant',
            '--force' => true,
        ]);
    }
}
