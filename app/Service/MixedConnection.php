<?php

namespace App\Service;

use Illuminate\Support\Facades\DB;
use LaravelEnso\Multitenancy\Enums\Connections;

class MixedConnection
{
    public static function set($user, $tenant)
    {
        // if ($tenant) {
        //     self::connection(Connections::Tenant);
        // } else {
        //     self::connection('mysql');
        // }
        // // This is test for tenant db
        // // self::connection(Connections::Tenant);

        // // $key = 'database.default';
        // // $value = Connections::Mixed;
        // // config([$key => $value]);

        // DB::purge(Connections::Mixed);

        // DB::reconnect(Connections::Mixed);
    }

    private static function connection($connection)
    {
        $key = 'database.connections.'.Connections::Mixed.'.database';
        $value = config("database.connections.{$connection}.database");
        error_log('+++++++++++++++++++++++++++++++++++'.$value);
        config([$key => $value]);
    }
}
