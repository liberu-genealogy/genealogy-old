<?php

namespace App\Jobs\Tenant;

use App\Models\Company;
use App\Models\Person;
use App\Models\Tenant;
use App\Models\User;
use App\Service\Tenant as TT;
use Hash;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Migrations implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $tenant;
    private $name;
    private $email;
    private $password;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Company $tenant, $name = '', $email = '', $password = '')
    {
        //
        $this->tenant = $tenant;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
	$this->queue = 'high';
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //

        // Tenant::set($this->tenant);
        // $company = Tenant::get();
        // $db = Connections::Tenant.$company->id.'_1';
        // Artisan::call('migrate', [
        //     '--database' => Connections::Tenant,
        //     '--path' => '/database/migrations/tenant',
        //     '--force' => true,
        // ]);

        /**  Artisan::call('db:seed', [
         * '--database' => Connections::Tenant,
         * '--force' => true,
         * ]);.
         **/
        // $person = DB::connection(Connections::Tenant)->table('people')->insertGetId([
        //     'email'=>$this->email,
        //     'name' => $this->name,
        // ]);
        // // g$tenant = Tenant::find('->initialize($tenant);et user_group_id
        $tenants = Tenant::find($this->tenant->id);

        tenancy()->initialize($tenants);
        $em = $this->email;
        $na = $this->name;
        $person = $tenants->run(function () use ($em, $na) {
            Person::create([
                'email'=>$em,
                'name' => $na,

            ]);
        });
        $user_group = 1;

        // get role_id
        $role = 1;
        $pa = $this->password;
        $tenants->run(function () use ($em, $pa, $person, $user_group, $role) {
            User::create([
                'email' => $em,
                'password' => Hash::make($pa),
                'person_id' => $person,
                'group_id' => $user_group,
                'role_id' => $role,
                'is_active' => 1,

            ]);
        });

        /**     $person = DB::connection(Connections::Tenant)->table('users')->insert([
         * 'email' => $this->email,
         * 'password' => Hash::make($this->password),
         * 'person_id' => $person,
         * 'group_id' => $user_group,
         * 'role_id' => $role,
         * 'is_active' => 1,
         * ]);.
         **/
    }
}
