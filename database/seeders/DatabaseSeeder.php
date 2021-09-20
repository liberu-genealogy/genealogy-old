<?php

namespace Database\Seeders;

use Database\Seeders\CompanySeeder;
use Database\Seeders\CustomPermissionsSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Seeder;
use LaravelEnso\Countries\Database\Seeders\CountrySeeder;
use LaravelEnso\Localisation\Database\Seeders\LanguageSeeder;
use LaravelEnso\UserGroups\Database\Seeders\UserGroupSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserGroupSeeder::class,
            UserSeeder::class,
            LanguageSeeder::class,
            CountrySeeder::class,
            CompanySeeder::class,
            CustomPermissionSeeder::class,
        ]);
    }
}
