<?php

use Illuminate\Database\Seeder;
use LaravelEnso\Core\App\Models\User;
use LaravelEnso\Core\App\Models\UserGroup;
use LaravelEnso\People\App\Enums\Titles;
use LaravelEnso\People\App\Models\Person;
use LaravelEnso\Roles\App\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        $person = $this->person();

        factory(User::class)->create([
            'person_id' => $person->id,
            'group_id' => UserGroup::whereName('Administrators')->first()->id,
            'email' => $person->email,
            'password' => '$2y$10$06TrEefmqWBO7xghm2PUzeF/O0wcawFUv8TKYq.NF6Dsa0Pnmd/F2',
            'role_id' => Role::whereName('admin')->first()->id,
            'is_active' => true,
        ])->generateAvatar();
    }

    private function person()
    {
        return factory(Person::class)->create([
            'title' => Titles::Mr,
            'name' => 'Admin Root',
	    'givn' => 'Admin',
	    'surn' => 'Root',
            'appellative' => 'Admin',
            'email' => 'admin@genealogia.co.uk',
            'birthday' => '1970-01-01',
            'phone' => '+4412345678910',
        ]);
    }
}
