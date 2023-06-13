<?php

namespace App\Console\Commands\Synchronize;

use App\Models\Person;
use App\Models\Tenant;
use App\Models\TenantPerson;
use Illuminate\Console\Command;

class CopyPeopleFromTenancyToGenealogy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'synchronize:people';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Copy people records from tenancy databases into main genealogy database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $recordsSince = TenantPerson::orderBy('updated_at', 'desc')->first()?->updated_at;
        $this->info('Tenant people records syncronization since: '.($recordsSince ?: 'start'));

        tenancy()->query()->cursor()->each(function (Tenant $tenant) use ($recordsSince) {
            try {
                tenancy()->initialize($tenant);

                $tenantPersonQuery = Person::query();

                if ($recordsSince) {
                    $tenantPersonQuery->where('updated_at', '>=', $recordsSince);
                }

                $this->info('Processing tenant #'.$tenant->id.' records: '.(clone $tenantPersonQuery)->count());
                $tenantPersonQuery->chunk(100, function ($people) use ($tenant) {
                    // clear old records and push updated ones
                    TenantPerson::where('tenant_id', $tenant->id)
                        ->whereIn('tenant_person_id', $people->pluck('id'))
                        ->delete();

                    foreach ($people as $person) {
                        $personData = $person->toArray();
                        unset($personData['id']);
                        $personData['tenant_id'] = $tenant->id;
                        $personData['tenant_person_id'] = $person->id;

                        (new TenantPerson($personData))->save();
                    }
                });

                tenancy()->end();
            } catch (\Exception) {
            }
        });

        return Command::SUCCESS;
    }
}
