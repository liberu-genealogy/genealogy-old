<?php

namespace Database\Seeders;

use Database\Seeders\CompanySeeder;
use Database\Seeders\CustomPermissionsSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Seeder;
use LaravelLiberu\Countries\Database\Seeders\CountrySeeder;
use LaravelLiberu\Files\Database\Seeders\TypeSeeder;
use LaravelLiberu\Localisation\Database\Seeders\LanguageSeeder;
use LaravelLiberu\UserGroups\Database\Seeders\UserGroupSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserGroupSeeder::class,
            TypeSeeder::class,
            UserSeeder::class,
            LanguageSeeder::class,
            CountrySeeder::class,
            CompanySeeder::class,
            //            CustomPermissionSeeder::class,
        ]);
    }
}
