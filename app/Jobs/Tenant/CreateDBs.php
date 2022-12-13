<?php

namespace App\Jobs\Tenant;

use App\Models\Company;
use App\Models\Tenant as Tenants;
use App\Tree;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateDBs implements ShouldQueue
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
        $tenant = Tenants::create([
            'id' => $this->tenant->id,
        ]);
    }
}
