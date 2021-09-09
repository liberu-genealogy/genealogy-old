<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use LaravelEnso\Companies\Enums\Statuses;
use LaravelEnso\Companies\Models\Company;
use LaravelEnso\People\Models\Person;

class CompanySeeder extends Seeder
{
    public function run()
    {
        $company = $this->company();

        $person = Person::where('id', '1')->first();
        $person->companies()->attach(1, ['person_id' => 1, 'is_main' => 1, 'is_mandatary' => 1, 'company_id' => 1]);
    }

    private function company()
    {
        return Company::create([
            'name' => 'Admin Root',
            'is_tenant' => 0,
            'email' => 'admin@familytree365.com',
            'phone' => '+4412345678910',
            'status' => Statuses::Active,
        ]);
    }
}
