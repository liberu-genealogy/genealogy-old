<?php

namespace App\Service;

use Illuminate\Support\Facades\DB;
use LaravelEnso\Multitenancy\Enums\Connections;

class MixedConnection
{
    public static function set($user, $tenant)
    {
        if ($tenant) {
            self::connection(Connections::Tenant);
        } else {
            self::connection('mysql');
        }
        // This is test for tenant db
        self::connection(Connections::Tenant);

        // $key = 'database.default';
        // $value = Connections::Tenant;
        // config([$key => $value]);

        DB::purge(Connections::Tenant);

        DB::reconnect(Connections::Tenant);
    }

    private static function connection($connection)
    {
        $key = 'database.connections.'.Connections::Tenant.'.database';
        $value = config("database.connections.{$connection}.database");
        error_log($key.'=>'.$value);
        config([$key => $value]);
    }
}
