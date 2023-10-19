<?php

namespace App\Traits;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

trait TenantConnectionResolver
{
    public function getConnectionName()
    {
        if (! App::runningUnitTests() && Auth::check()) {
            $user = \Auth::user();
            $role_id = $user->role_id;
            if ($user->isAdmin()) {
                return env('DB_DATABASE', 'genealogy'); //'liberu');
            }
            if (session()->get('db')) {
                return 'tenantdb';
            }
        }

        return $this->connection;
    }
}
