<?php

namespace App\Service;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use LaravelEnso\Companies\Models\Company;
use LaravelEnso\Multitenancy\Enums\Connections;

class Tenant
{
    private static $tenantPrefix;

    public static function set(Company $company)
    {
        $key = 'database.connections.'.Connections::Tenant.'.database';
        $value = self::tenantPrefix().$company->id;
        config([$key => $value]);

        DB::purge(Connections::Tenant);

        DB::reconnect(Connections::Tenant);
    }

    public static function get()
    {
        return Company::find(self::tenantId());
    }

    public static function tenantDatabase()
    {
        return config('database.connections.'.Connections::Tenant.'.database');
    }

    private static function tenantId()
    {
        return (int) Str::replaceFirst(Connections::Tenant, '', self::tenantDatabase());
    }

    private static function tenantPrefix()
    {
        if (! isset(self::$tenantPrefix)) {
            self::$tenantPrefix = self::tenantDatabase();
        }

        return self::$tenantPrefix;
    }
}
