<?php

namespace App\Models;

use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\TenantDatabaseManagers\MySQLDatabaseManager;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;
use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\StorageDrivers\RedisStorageDriver;
use Stancl\Tenancy\StorageDrivers\Database\DatabaseStorageDriver;
class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase;
//    use MySQLDatabaseManager;
    use DatabaseStorageDriver;
//    use RedisStorageDriver;
//    use HasDomains;
}
