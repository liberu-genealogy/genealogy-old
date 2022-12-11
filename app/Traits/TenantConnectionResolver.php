<?php

namespace App\Traits;

trait TenantConnectionResolver
{
    public function getConnectionName()
    {
        if (session()->get('db')) {
            return 'tenantdb';
        }

        return $this->connection;
    }
}
