<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use LaravelLiberu\Companies\Enums\Statuses;
use LaravelLiberu\Companies\Models\Company;
use LaravelLiberu\People\Models\Person;

class CompanySeeder extends Seeder
{
    public function run()
    {
        $admin_company = $this->admin_company();

        $person = Person::where('id', '1')->first();
        $person->companies()->attach(1, ['person_id' => 1, 'is_main' => 1, 'is_mandatary' => 1, 'company_id' => $admin_company->id]);

        $supervisor_company = $this->supervisor_company();
        $person = Person::where('id', '2')->first();
        $person->companies()->attach(1, ['person_id' => 2, 'is_main' => 1, 'is_mandatary' => 1, 'company_id' => $supervisor_company->id]);
    }

    private function admin_company()
    {
        return Company::create([
            'name' => 'Admin Root',
            'is_tenant' => 0,
            'email' => 'admin@familytree365.com',
            'phone' => '+4412345678910',
            'status' => Statuses::Active,
        ]);
    }

    private function supervisor_company()
    {
        return Company::create([
            'name' => 'Supervisor',
            'is_tenant' => 0,
            'email' => 'supervisor@familytree365.com',
            'phone' => '+4412345678910',
            'status' => Statuses::Active,
        ]);
    }
}
