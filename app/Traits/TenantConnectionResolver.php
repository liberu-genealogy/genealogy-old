<?php

namespace App\Traits;

use Illuminate\Support\Facades\App;

trait TenantConnectionResolver
{
    public function getConnectionName()
    {

if (! App::runningUnitTests()) {
        if (session()->get('db')) {
            return 'tenantdb';
        }

        return $this->connection;
    }
}
}
