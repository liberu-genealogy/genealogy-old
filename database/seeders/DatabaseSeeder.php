<?php

namespace Database\Seeders;

use Database\Seeders\CompanySeeder;
use Database\Seeders\CustomPermissionSeeder;
use Illuminate\Database\Seeder;
use LaravelEnso\Core\Database\Seeders\UserGroupSeeder;
use Database\Seeders\UserSeeder;
use LaravelEnso\Countries\Database\Seeders\CountrySeeder;
use LaravelEnso\Localisation\Database\Seeders\LanguageSeeder;
use LaravelEnso\Roles\Database\Seeders\RoleSeeder;

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
