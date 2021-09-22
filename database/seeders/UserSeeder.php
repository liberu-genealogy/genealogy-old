<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use LaravelEnso\People\Models\Person;
use LaravelEnso\Roles\Models\Role;
use LaravelEnso\UserGroups\Models\UserGroup;
use LaravelEnso\Users\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $admin = $this->admin();
        $supervisor = $this->supervisor();

        User::factory()->create([
            'person_id' => $admin->id,
            'group_id' => UserGroup::whereName('Administrators')->first()->id,
            'email' => $admin->email,
            'password' => '$2y$10$06TrEefmqWBO7xghm2PUzeF/O0wcawFUv8TKYq.NF6Dsa0Pnmd/F2',
            'role_id' => Role::whereName('admin')->first()->id,
            'is_active' => true,
        ])->generateAvatar();

        User::factory()->create([
            'person_id' => $supervisor->id,
            'group_id' => UserGroup::whereName('Administrators')->first()->id,
            'email' => $supervisor->email,
            'password' => '$2y$10$06TrEefmqWBO7xghm2PUzeF/O0wcawFUv8TKYq.NF6Dsa0Pnmd/F2',
            'role_id' => Role::whereName('supervisor')->first()->id,
            'is_active' => true,
        ])->generateAvatar();
    }

    private function admin()
    {
        return Person::factory()->create([
            'name' => 'Admin Root',
            'appellative' => 'Admin',
            'email' => 'admin@familytree365.com',
            'birthday' => '1970-01-01',
            'phone' => '+4412345678910',
        ]);
    }

    private function supervisor()
    {
        return Person::factory()->create([
            'name' => 'Supervisor',
            'appellative' => 'Supervisor',
            'email' => 'supervisor@familytree365.com',
            'birthday' => '1970-01-01',
            'phone' => '+4412345678911',
        ]);
    }
}
