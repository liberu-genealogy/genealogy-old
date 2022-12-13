<?php

namespace App\Traits;

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
